<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.07.19
 *
 */

namespace App\Modules\Users\Services\UserEnvironmentService\Implementations;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

class UserCompanyEnvironmentService extends AbstractUserEnvironmentService
{
    /**
     * @return Collection
     */
    public function getFeedsList(): Collection
    {
        return $this->feedModel->company($this->user->company_id)->paginateById();
    }

    /**
     * @param null|string $search
     * @param int|null $limit
     * @return AbstractPaginator
     */
    public function getChallengesList(?string $search, ?int $limit): AbstractPaginator
    {
        return $this->challengeModel->searchForCompanyEnvironment($this->user, $search, $limit);
    }
}
