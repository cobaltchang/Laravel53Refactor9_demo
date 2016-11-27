<?php

namespace App\Services;

class ShippingService
{
    /**
     * 計算運費
     * @param array $weightArray
     * @param string $companyName
     * @return int
     */
    public function calculateFee(array $weightArray, string $companyName): int
    {
        $amount = 0;

        switch ($companyName) {
            case 'BlackCat':
                $amount = $this->blackCatCalculateFee($weightArray, $amount);
                break;
            case 'Hsinchu':
                $amount = $this->hsinchuCalculateFee($weightArray, $amount);
                break;
            case 'PostOffice':
                $amount = $this->postCalculateFee($weightArray, $amount);
                break;
            default:
                $amount = $this->blackCatCalculateFee($weightArray, $amount);
                break;
        }

        return $amount;
    }

    /**
     * @param array $weightArray
     * @param int $amount
     * @return int
     */
    public function blackCatCalculateFee(array $weightArray, int $amount) : int
    {
        $weights = collect($weightArray);

        foreach ($weights as $weight) {
            $amount = $amount + (100 + $weight * 10);
        }

        return $amount;
    }

    /**
     * @param array $weightArray
     * @param int $amount
     * @return int
     */
    public function hsinchuCalculateFee(array $weightArray, int $amount) : int
    {
        $weights = collect($weightArray);

        foreach ($weights as $weight) {
            $amount = $amount + (80 + $weight * 15);
        }

        return $amount;
    }

    /**
     * @param array $weightArray
     * @param int $amount
     * @return int
     */
    public function postCalculateFee(array $weightArray, int $amount) : int
    {
        $weights = collect($weightArray);

        foreach ($weights as $weight) {
            $amount = $amount + (60 + $weight * 20);
        }

        return $amount;
    }
}