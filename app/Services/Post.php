<?php

namespace App\Services;

class Post extends AbstractLogistics
{
    /**
     * @param array $weightArray
     * @param int $amount
     * @return int
     */
    public function calculateFee(array $weightArray, int $amount) : int
    {
        $weights = $this->arrayToCollection($weightArray);

        $amount = $this->loopWeights($amount, $weights, function (int $weight) {
            return (60 + $weight * 20);
        });

        return $amount;
    }
}