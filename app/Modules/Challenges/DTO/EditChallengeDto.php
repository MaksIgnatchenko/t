<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 18.04.19
 *
 */

namespace App\Modules\Challenges\DTO;


use App\Modules\Challenges\Models\Challenge;
use Illuminate\Support\Carbon;

class EditChallengeDto extends CreateChallengeDTO
{
    /**
     * @var Challenge
     */
    private $challenge;

    /**
     * EditChallengeDto constructor.
     * @param array $companies
     * @param array $countries
     * @param array $proofTypes
     * @param array $videoLengthTypes
     * @param Challenge $challenge
     */
    public function __construct(array $companies, array $countries, array $proofTypes, array $videoLengthTypes, Challenge $challenge)
    {
        parent::__construct($companies, $countries, $proofTypes, $videoLengthTypes);
        $this->challenge = $challenge;
    }

    /**
     * @return int
     */
    public function getChallengeId() : int
    {
        return $this->challenge->id;
    }

    /**
     * @return string|null
     */
    public function getCurrentImage() : ?string
    {
        return $this->challenge->image;
    }

    /**
     * @return string|null
     */
    public function getCurrentImageName() : ?string
    {
        return $this->challenge->getOriginal('image');
    }

    /**
     * @return string
     */
    public function getCurrentName() : string
    {
        return $this->challenge->name;
    }

    /**
     * @return string
     */
    public function getCurrentLink() : string
    {
        return $this->challenge->link;
    }

    /**
     * @return string
     */
    public function getCurrentCity() : string
    {
        return $this->challenge->city;
    }

    /**
     * @return string
     */
    public function getCurrentCountry() : string
    {
        return $this->challenge->country;
    }

    /**
     * @return int
     */
    public function getCurrentParticipantsLimit() : int
    {
        return $this->challenge->participants_limit;
    }

    /**
     * @return int|null
     */
    public function getCurrentCompany() : ?int
    {
        return $this->challenge->company->id;
    }

    /**
     * @return string
     */
    public function getCurrentProofType() : string
    {
        return $this->challenge->proof_type;
    }

    /**
     * @return int
     */
    public function getCurrentItemsCount() : int
    {
        return $this->challenge->items_count_in_proof;
    }

    /**
     * @return int|null
     */
    public function getCurrentVideoDuration() : ?int
    {
        return $this->challenge->video_duration;
    }

    /**
     * @return string
     */
    public function getCurrentStartDate() : string
    {
        return Carbon::parse($this->challenge->start_date)->format('Y-m-d H:i');
    }

    /**
     * @return string
     */
    public function getCurrentEndDate() : string
    {
        return Carbon::parse($this->challenge->end_date)->format('Y-m-d H:i');
    }

    /**
     * @return string
     */
    public function getCurrentDescription() : string
    {
        return $this->challenge->description;
    }

}