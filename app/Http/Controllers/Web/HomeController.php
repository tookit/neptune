<?php


namespace App\Http\Controllers\Web;

use App\Models\Mall\Category;
use App\Models\Mall\Product;
class HomeController
{
    public function index(){

//        dd(Product::find(446)->getFirstMediaUrl('fiber'));
        $categories = Category::where(['parent_id'=>null])->get();
        $fiber = Category::with(['children','children.products'])->find(2110);
        return view('home.index',[
            'categories' => $categories,
            'fiber' => $fiber
        ]);
    }
}
