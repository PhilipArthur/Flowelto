@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Flower Image</th>
                    <th scope="col">Flower Name</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody style="background-color: rgb(255, 150, 52);">
                @foreach ($datas as $data)
                    <tr>
                        <td>
                            <img src="{{$data->product()->withTrashed()->first()->image}}" class="w-25">
                        </td>
                        <td>{{$data->product()->withTrashed()->first()->name}}</td>
                        <td>{{$data->product()->withTrashed()->first()->price * $data->quantity}}</td>
                        <td>{{$data->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right font-weight-bold">Total Price Rp. {{$total}}</div>
    </div>
@endsection
