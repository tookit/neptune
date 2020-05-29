<?php


namespace App\Http\Controllers\Web;

use App\Models\Mall\Category;

class HomeController
{
    public function index(){
        $categories = Category::where(['parent_id'=>null])->get();
        $fiber = Category::with(['children','children.products'])->find(2110);
        return view('home.index',[
            'categories' => $categories,
            'fiber' => $fiber
        ]);
    }
}
