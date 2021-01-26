<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function cart() {
        $datas = Auth::user()->products;
        return view('transaction.cart', compact('datas'));
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function addToCart(Request $request, $id) {
        if(Auth::check() && Auth::user()->role == 'user') {
            Validator::make($request->all(), [
                'quantity' => 'required | numeric | min:1'
            ])->validate();

            Auth::user()->products()->attach($id, ['quantity' => $request->quantity]);
            return redirect(route('userCart'));
        }

        return redirect(route('login'));
    }

    public function checkout() {
        $cartContent = Auth::user()->products;
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'date' => date('Y-m-d')
        ]);

        foreach ($cartContent as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item->pivot->product_id,
                'quantity' => $item->pivot->quantity
            ]);
        }

        Auth::user()->products()->detach();
        return back();
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function changeCartItemQty(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required | numeric | min:0'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->with('productId', $id);
        } else {
            if($request->quantity > 0) {
                Auth::user()->products()->updateExistingPivot($id, ['quantity' => $request->quantity]);
            } else {
                Auth::user()->products()->detach($id);
            }
            return back();
        }
    }

    public function transactionHistory() {
        $datas = Auth::user()->transactions()->orderBy('date', 'desc')->get();
        return view('transaction.history', compact('datas'));
    }

    /**
     * @param $id
     */
    public function transactionDetail($id) {
        $transaction = Transaction::find($id);
        $datas = $transaction->transactionDetails()->get();
        $total = 0;
        
        foreach($datas as $data) {
            $total += $data->quantity * $data->product()->withTrashed()->first()->price;
        }

        return view('transaction.transaction-detail', compact('datas', 'total'));
    }
}
