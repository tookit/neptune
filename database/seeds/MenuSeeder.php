<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                'name' => 'CMS',
                'sort_number'=>100,
                'uri'=>'/cms',
                'children' => [
                    [
                        'name' => 'Post',
                        'sort_number'=>100,
                        'uri'=>'/cms/posts',
                    ],
                    [
                        'name' => 'Category',
                        'sort_number'=>100,
                        'uri'=>'/cms/categories',
                    ],
                ],
            ],

            [
                'name' => 'Mall',
                'sort_number'=>100,
                'uri'=>'/mall',
                'children' => [
                    [
                        'name' => 'Product',
                        'sort_number'=>100,
                        'uri'=>'/mall/products',
                    ],
                    [
                        'name' => 'Category',
                        'sort_number'=>100,
                        'uri'=>'/mall/categories',
                    ],
                ],
            ],

            [
                'name' => 'System',
                'sort_number'=>100,
                'uri'=>'/sys',
                'children' => [
                    [
                        'name' => 'Menu',
                        'sort_number'=>100,
                        'uri'=>'/sys/menus',
                    ],
                    [
                        'name' => 'Log',
                        'sort_number'=>100,
                        'uri'=>'/sys/logs',
                    ],
                ],
            ]

        ];
        \App\Models\CMS\Menu::rebuildTree($data);
    }
}
