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
        // category 1
        QueryList::get('http://www.optico.com.cn/products')->find('li.ps-lv1')->map(function ( Elements $element){
            $name = $element->children('a')->text();
            $link = $this->base.$element->children('a')->attr('href');
            $element->children('ul')->find('li.ps-lv2')->map(function (Elements $ele){
                dd($ele->children('a')->text());
            });

//            $parent = ProductCategory::updateOrCreate(['name'=>$name],['name'=>$name,'reference_url'=>$link]);
//            $parent->makeRoot();
//            $element->find('li.ps-lv2 > a')->map(function (Elements $element) use ($parent) {
//                $name = $element->text();
//                $link = $this->base.$element->attr('href');
//                ProductCategory::updateOrCreate(['name'=>$name],['name'=>$name,'reference_url'=>$link,'parent_id'=>$parent->id]);
//            });
        });
        $this->info('Category finished');
    }
}
