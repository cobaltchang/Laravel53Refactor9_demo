<?php

namespace App\Services;

class BlackCat
{
    /**
     * @param array $weightArray
     * @param int $amount
     * @return int
     */
    public function calculateFee(array $weightArray, int $amount) : int
    {
        $weights = collect($weightArray);

        foreach ($weights as $weight) {
            $amount = $amount + (100 + $weight * 10);
        }

        return $amount;
    }
}