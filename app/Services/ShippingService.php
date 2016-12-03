<?php

namespace App\Services;

class ShippingService
{
    /**
     * 計算運費
     * @param array $weightArray
     * @param callable $closure
     * @param Logistics $logistics
     * @return int
     */
    public function calculateFee(array $weightArray, callable $closure, Logistics $logistics) : int
    {
        $amount = 0;

        return $logistics->calculateFee($weightArray, $amount, $closure);
    }
}