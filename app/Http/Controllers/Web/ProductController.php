<?php


namespace App\Http\Controllers\Web;
use App\Models\Mall\Product;
use App\Models\Mall\Category;
class ProductController
{
    public function index(){
        return view('product.index');
    }
    public function view($slug){
        $item = Product::where(['slug'=>$slug])->first();
        $categories = Category::where(['parent_id'=>null])->get();
        return view('product.item',[
            'categories'=> $categories,
            'item' => $item
        ]);
    }

    public function categories() {
        return view('product.categories');
    }

    public function category($slug) {
        $categories = Category::with(['children'])->where(['parent_id'=>null])->get();
        $item = Category::with(['products','children'])->where(['slug'=>$slug])->first();
        return view('product.category',[
            'item' => $item,
            'categories'=>$categories
        ]);
    }
}
