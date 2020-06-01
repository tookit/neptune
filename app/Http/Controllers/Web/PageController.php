<?php


namespace App\Http\Controllers\Web;
use App\Models\Mall\Category;

class PageController
{
    public function about(){
        $categories = Category::where(['parent_id'=>null])->get();
        return view('page.about',[
            'categories' => $categories
        ]);
    }
    public function contact(){
        $categories = Category::where(['parent_id'=>null])->get();
        return view('page.contact',[
            'categories' => $categories
        ]);
    }

    public function categories() {
    }

    public function category($slug) {

    }
}
