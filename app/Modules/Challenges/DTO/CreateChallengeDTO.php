<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\DTO;


use App\Helpers\PrettyNameHelper;

class CreateChallengeDTO
{
    /**
     * @var array
     */
    private $companies;

    /**
     * @var array
     */
    private $countries;

    /**
     * @var array
     */
    private $proofTypes;

    /**
     * @var array
     */
    private $videoLengthTypes;

    /**
     * CreateChallengeDTO constructor.
     * @param array $companies
     * @param array $countries
     * @param array $proofTypes
     * @param array $videoLengthTypes
     */
    public function __construct(array $companies, array $countries, array $proofTypes, array $videoLengthTypes)
    {
        $this->companies = $companies;
        $this->countries = $countries;
        $this->proofTypes = $proofTypes;
        $this->videoLengthTypes = $videoLengthTypes;
    }

    /**
     * @return array
     */
    public function getCompanies(): array
    {
        return $this->companies;
    }

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    /**
     * @return array
     */
    public function getProofTypes(): array
    {
        return array_map(function($proofName) {
            return PrettyNameHelper::transform($proofName);
        }, $this->proofTypes);
    }

    /**
     * @return array
     */
    public function getVideoLengthTypes(): array
    {
        return $this->videoLengthTypes;
    }
}