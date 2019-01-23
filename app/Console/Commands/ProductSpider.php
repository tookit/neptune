<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use QL\Dom\Elements;
use QL\QueryList;
use App\Models\ProductCategory;

class ProductSpider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spider:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    protected $base = 'http://www.optico.com.cn';


    static $tabMapping = [
        'FEATURES','APPLICATION','ELECTRICAL','PACKAGING','CONSTRUCTION','Characteristics','other','Specifications','Description','STANDARD'

    ];


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // product
        $fp = fopen(storage_path('items.csv'),'w');
        if (($handle = fopen(storage_path("product.csv"), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $url = $data[1];
                $item = $this->fetchProduct($url);
                fputcsv($fp,[
                   $item['name'],$item['cat'],$item['sub_cat'], $item['tabs'],$item['img']
                ]);
            }
            fclose($handle);
        }
    }


    protected function fetchProduct($url = '')
    {
        $cat = QueryList::get($url)->find('ul.breadcrumb li:first')->text();
        $subCat = QueryList::get($url)->find('ul.breadcrumb li:nth-child(2) ')->text();
        $name = QueryList::get($url)->find('h1')->text();
        $img = QueryList::get($url)->find('.p-img')->attr('src');
        $body = QueryList::get($url)->find('.tab-pane')->map(function (Elements $ele) use ($url) {
           $id = $ele->attr('id');
           $content = $ele->children('.para-content')->htmls()->first();
           $tabSelector = "a[href=#{$id}]";
           $tabName = strtolower(QueryList::get($url)->find($tabSelector)->text());
           return [ 'key' => $tabName, 'value'  => $content];

        });
        $tabs = $body->map(function ($item){
           return $item['key'];
        });
        return [
            'cat' => $cat,
            'sub_cat' => $subCat,
            'name' => $name,
            'tabs' => $tabs->implode('|'),
            'img' => $img,
            'body' => $body
        ];
    }

    protected function fetchCategory()
    {

    }

    protected function fetchProductLinks()
    {

        $fp = fopen(storage_path('product.csv'),'w');
        QueryList::get('http://www.optico.com.cn/products')->find('li.ps-lv3')->map(function ( Elements $element) use ($fp){
            $name = $element->children('a')->text();
            $link = $this->base.$element->children('a')->attr('href');
            fputcsv($fp,[$name,$link]);

        });
        $this->info('Product Links Fetched');
    }
}
