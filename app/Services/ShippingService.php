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
                $logistics = new BlackCat();
                $amount = $logistics->calculateFee($weightArray, $amount);

                break;
            case 'Hsinchu':
                $logistics = new Hsinchu();
                $amount = $logistics->calculateFee($weightArray, $amount);

                break;
            case 'PostOffice':
                $logistics = new Post();
                $amount = $logistics->calculateFee($weightArray, $amount);

                break;
            default:
                $logistics = new BlackCat();
                $amount = $logistics->calculateFee($weightArray, $amount);

                break;
        }

        return $amount;
    }






}