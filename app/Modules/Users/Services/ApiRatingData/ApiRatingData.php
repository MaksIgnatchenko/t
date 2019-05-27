<?php

namespace App\Modules\Users\Services\ApiRatingData;

class ApiRatingData
{
    private $currentUser;

    public function __construct(Rankable $currentUser)
    {
        $this->currentUser = $currentUser;
    }

    /**
     * @return array
     */
    public function buildData() : array
    {
        return [
            'my_rating' => $this->currentUser->getMyPositionFormattedData(),
            'rating' => $this->currentUser->getRating(),
        ];
    }
}