<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.06.19
 *
 */

namespace App\Modules\Users\Services\UserEnvironmentService\Implementations;

use App\Modules\Challenges\Models\Challenge;
use App\Modules\Users\Services\ApiRatingData\ApiRatingData;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\EnvironmentAble;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\UserEnvironmentServiceInterface;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

abstract class AbstractUserEnvironmentService implements UserEnvironmentServiceInterface
{
    protected $user;

    protected $ratingService;

    protected $challengeModel;

    protected $feedModel;

    public function __construct(EnvironmentAble $user)
    {
        $this->user = $user;
        $this->ratingService = new ApiRatingData($this->user);
        $this->challengeModel = app(Challenge::class);
        $this->feedModel = app(Challenge::class);
    }

    /**
     * @return array
     */
    public function getRating(): array
    {
        return $this->ratingService->buildData();
    }

    /**
     * @return Collection
     */
    abstract public function getFeedsList(): Collection;

    /**
     * @param null|string $search
     * @param int|null $limit
     * @return AbstractPaginator
     */
    abstract public function getChallengesList(?string $search, ?int $limit): AbstractPaginator;
}
