<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.02.19
 *
 */

namespace App\Modules\Challenges\DTO;

use App\Modules\Challenges\Models\Challenge;

class ShowChallengeDTO
{
    /**
     * @var Challenge
     */
    private $challenge;

    /**
     * ShowChallengeDTO constructor.
     * @param Challenge $challenge
     */
    public function __construct(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->challenge->name;
    }

    /**
     * @return string|null
     */
    public function getImageUrl() : ?string
    {
        return $this->challenge->image;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->challenge->description;
    }

    /**
     * @return string
     */
    public function getLink() : string
    {
        return $this->challenge->link;
    }

    /**
     * @return string
     */
    public function getCountry() : string
    {
        return $this->challenge->country;
    }

    /**
     * @return string|null
     */
    public function getCity() : ?string
    {
        return $this->challenge->city;
    }

    /**
     * @return string|null
     */
    public function getCompanyName() : ?string
    {
        if ($company = $this->challenge->company) {
            return $company->name;
        }
        return null;
    }

    /**
     * @return string
     */
    public function getProofType() : string
    {
        return $this->challenge->proof_type;
    }

    /**
     * @return int
     */
    public function getParticipantsLimit() : int
    {
        return $this->challenge->participants_limit;
    }

    /**
     * @return string
     */
    public function getStartDate() : string
    {
        return $this->challenge->start_date;
    }

    /**
     * @return string
     */
    public function getEndDate() : string
    {
        return $this->challenge->end_date;
    }
}