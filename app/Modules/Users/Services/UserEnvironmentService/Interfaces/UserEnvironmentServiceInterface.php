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
     * @return AbstractPaginator
     */
    public function getChallengesList(): AbstractPaginator;

    /**
     * @return Collection
     */
    public function getFeedsList(): Collection;

    /**
     * @return array
     */
    public function getRating(): array;
}