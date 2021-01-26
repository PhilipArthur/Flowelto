<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function manageCategory() {
        $datas = $this->getAllCategory();
        return view('category.manage', compact('datas'));
    }

    public function index(){
        $datas = $this->getAllCategory();
        return view('welcome',compact('datas'));
    }

    public function edit($id) {
        return view('category.update', ['datas' => $this->getCategoryById($id)]);
    }

    /**
     * @param Request $request
     * @param $id         
     */
    public function update(Request $request, $id) {
        $request->validate([
            'categoryName' => 'required|unique:categories,name|min:5',
            'categoryImage' => 'file|mimes:png,jpg,jpeg'
        ]);

        $category = $this->getCategoryById($id);
        $filePath = $category->image;

        if($request->categoryImage != null) {
            Storage::delete('\public'.str_replace('\storage', '', $category->image));
            $filePath = Storage::putFile('\public\categories', $request->categoryImage);
        }

        $category->update([
            'name' => $request->categoryName,
            'image' => str_replace('\public', '\storage', $filePath)
        ]);

        return back();
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $category = $this->getCategoryById($id);
        $category->products()->delete();
        return back()->with('success', 'All products from '.$category->name.' category has been deleted');
    }

    public function getProductByCategory($id){
        $category = $this->getCategoryById($id);
        $datas = $category->products()->paginate(8);
        return view('home',compact('datas'));
    }

    private function getAllCategory() {
        return Category::all();
    }

    private function getCategoryById($id) {
        return Category::find($id);
    }
}
