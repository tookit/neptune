<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Tag;
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
    protected $signature = 'spider:optico';

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
        $this->storeProduct();
    }


    protected function storeProduct()
    {
        $fp = fopen(storage_path('items.csv'),'w');
        if (($handle = fopen(storage_path("product.csv"), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $url = $data[1];
                $tmp = $this->fetchProduct($url);
                $item = $tmp[0];
                // handle product
                $product = Product::where('name',$item['name'])->first() ?? (new Product);
                $product->fill([
                    'name'=>$item['name'],
                    'featured_img' => $item['img'],
                    'reference_url' => $url
                ]);
                $product->save();

                // handle category
                $category = ProductCategory::where('name',$item['cat'])->first() ?? (new ProductCategory());
                $category->fill([
                    'name' =>$item['cat']
                ]);
                $category->save();

                $subCategory = ProductCategory::where('name',$item['sub_cat'])->first() ?? (new ProductCategory());
                $subCategory->fill([
                    'name' => $item['sub_cat']
                ]);
                $subCategory->parent()->associate($category)->save();

                $product->attachCategories($subCategory);

                if(isset($item['content'])){
                    foreach ($item['content'] as $tab){
                        $key = strtolower($tab['key']);
                        $data    =
                            [
                                'name' => $key,
                                'description' => $url

                            ];
                        $instance  = Tag::updateOrCreate(['name'=>$key],$data);
                        $instance->fill($data);
                        $instance->save();
                    }

                }
//                fputcsv($fp,$item);
                $this->info($item['name'].'  done .');
            }
            fclose($handle);
        }
    }

    protected function fetchProduct($url = '')
    {

        $queryList = QueryList::get($url);
        $item =  $queryList->rules($this->productRules)->range('#main-wap')->queryData(function($item) use($queryList) {

           $item['content'] = $queryList->html($item['content'])->rules([
                'key' => ['.nav-tabs > li > a','text'],
                'value' => ['.tab-pane > div','html']
           ])->range('')->queryData();
           return $item;

        });
        $queryList->destruct();
        return $item;

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
