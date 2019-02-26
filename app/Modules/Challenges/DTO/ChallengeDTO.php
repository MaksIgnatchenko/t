<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\DTO;


class ChallengeDTO
{
    /**
     * @var array
     */
    private $companies;

    /**
     * @var array
     */
    private $countries;

    private $proofTypes;

    /**
     * ChallengeDTO constructor.
     * @param array $companies
     * @param array $countries
     */
    public function __construct(array $companies, array $countries, array $proofTypes)
    {
        $this->companies = $companies;
        $this->countries = $countries;
        $this->proofTypes = $proofTypes;
    }

    /**
     * @return array
     */
    public function getCompanies() : array
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
        return $this->proofTypes;
    }
}