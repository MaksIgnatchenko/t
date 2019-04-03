<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.02.19
 *
 */

namespace App\Modules\Challenges\DTO;

use App\Helpers\PrettyNameHelper;
use App\Modules\Challenges\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
    public function getName(): string
    {
        return $this->challenge->name;
    }

    /**
     * @return int
     */

    public function getChallengeId(): int
    {
        return $this->challenge->id;
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): ?string
    {
        return $this->challenge->image ?? $this->challenge->image_with_default;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->challenge->description;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->challenge->link;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->challenge->country;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->challenge->city;
    }

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        if ($company = $this->challenge->company) {
            return $company->name;
        }
        return null;
    }

    /**
     * @return string
     */
    public function getProofType(): string
    {
        return PrettyNameHelper::transform($this->challenge->proof_type);
    }

    /**
     * @return int
     */
    public function getParticipantsLimit(): int
    {
        return $this->challenge->participants_limit;
    }

    /**
     * @return int
     */
    public function getParticipantsCount(): int
    {
        return $this->challenge->participants_count;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return Carbon::parse($this->challenge->start_date)->toDateString();
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return Carbon::parse($this->challenge->end_date)->toDateString();
    }

    /**
     * @return int
     */
    public function getRequiredProofItems() : int
    {
        return $this->challenge->items_count_in_proof;
    }

    /**
     * @return int|null
     */
    public function getVideoDuration() : ?int
    {
        return $this->challenge->video_duration;
    }

    /**
     * @return bool
     */
    public function isMultipleProofItems() : bool
    {
        return $this->challenge->items_count_in_proof > 1;
    }
}