<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use QL\Dom\Elements;
use QL\QueryList;
use App\Models\ProductCategory;
use App\Models\ProductApplication;

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


    protected $productRules = [

        'name' => ['h1','text'],
        'cat' => ['ul.breadcrumb li:first','text'],
        'sub_cat' => ['ul.breadcrumb li:nth-child(2)','text'],
        'img' => ['.p-img','src'],
        'content'=>['.tabbable','html']

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
//        $this->fetchCategory()->each(function ($item){
//
//            ProductCategory::create($item);
//
//        });
    }


    protected function storeProduct()
    {
        $fp = fopen(storage_path('items.csv'),'w');
        if (($handle = fopen(storage_path("product.csv"), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $url = $data[1];
                $tmp = $this->fetchProduct($url);
                $item = $tmp[0];
                if(isset($item['content'])){
                    foreach ($item['content'] as $tab){
                        ProductApplication::updateOrCreate(['name'=>$tab['key']],['name'=>$tab['key'],'description'=>$url]);
                    }

                }
                fputcsv($fp,$item);
                $this->info($item['name'].'  done .');
            }
            fclose($handle);
        }
    }

    protected function fetchProduct($url = '')
    {

        return QueryList::get($url)->rules($this->productRules)->range('#main-wap')->queryData(function($item){

           $item['content'] = QueryList::html($item['content'])->rules([
                'key' => ['.nav-tabs > li > a','text'],
                'value' => ['.tab-pane > div','html']
            ])->range('')->queryData();
            return $item;

        });

    }

    protected function fetchCategory()
    {
        $ql =  QueryList::get('http://www.optico.com.cn/products');
        return $ql->find('ul.ps-lv1-list > li')->map(function (Elements $ele){

            return [
                'name' => $ele->children('a')->text(),
                'children' => $ele->find('.ps-lv2-list > li > a ')->map(function (Elements $ele){
                    return ['name' => $ele->text()];
                })->toArray()
            ];
        });
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
