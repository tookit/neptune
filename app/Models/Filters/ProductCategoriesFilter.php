<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2019/2/5
 * Time: 下午2:44
 */

namespace App\Models\Filters;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ProductCategoriesFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $property) : Builder
    {
        return $query->whereHas('categories', function (Builder $query) use ($value) {
            $query->where('product_category_id', $value);
        });
    }
}

