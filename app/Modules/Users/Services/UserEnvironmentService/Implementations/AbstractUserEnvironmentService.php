<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.06.19
 *
 */

namespace App\Modules\Users\Services\UserEnvironmentService\Implementations;

use App\Modules\Challenges\Models\Challenge;
use App\Modules\Users\Services\ApiRatingData\ApiRatingData;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\UserEnvironmentServiceInterface;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

class AbstractUserEnvironmentService implements UserEnvironmentServiceInterface
{
    protected $user;

    protected $ratingService;

    protected $challengeModel;

    protected $feedModel;

    public function __construct($user)
    {
        $this->user = $user;
        $this->ratingService = new ApiRatingData($this->user);
        $this->challengeModel = app(Challenge::class);
        $this->feedModel = app(Challenge::class);
    }

    public function getRating(): array
    {
        // TODO: Implement getRating() method.
    }

    public function getFeedsList(): Collection
    {
        // TODO: Implement getFeedsList() method.
    }

    public function getChallengesList(): AbstractPaginator
    {
        // TODO: Implement getChallengesList() method.
    }


}