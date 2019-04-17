<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.04.19
 *
 */

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

trait CustomPaginatorTrait
{
    /**
     * @param $query
     * @return Collection
     */
    public function scopePaginateById($query) : Collection
    {
        $id = Input::get('id');
        $limit = Input::get('limit') ?? config('custom.feeds_count_per_page');

        if (!$id) {
            return $query->orderBy('id', 'desc')->limit($limit)->get();
        }

        return $query->orderBy('id', 'desc')->where('id', '>', $id)->limit($limit)->get();
    }

}