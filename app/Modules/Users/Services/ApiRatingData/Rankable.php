<?php

namespace App\Modules\Users\Services\ApiRatingData;


use Illuminate\Pagination\AbstractPaginator;

interface Rankable
{
    /**
     * @return AbstractPaginator
     */
    public function getRating() : AbstractPaginator;

    /**
     * @return int
     */
    public function getCurrentPosition() : int;

    /**
     * @return array
     */
    public function getMyPositionFormattedData() : array;

}