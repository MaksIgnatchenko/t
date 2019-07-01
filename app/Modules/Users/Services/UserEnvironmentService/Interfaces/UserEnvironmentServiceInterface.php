<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.06.19
 *
 */

namespace App\Modules\Users\Services\UserEnvironmentService\Interfaces;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

interface UserEnvironmentServiceInterface
{
    /**
     * @param null|string $search
     * @param int|null $limit
     * @return AbstractPaginator
     */
    public function getChallengesList(?string $search, ?int $limit): AbstractPaginator;

    /**
     * @return Collection
     */
    public function getFeedsList(): Collection;

    /**
     * @return array
     */
    public function getRating(): array;
}
