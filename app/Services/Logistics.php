<?php

namespace App\Services;

use Illuminate\Support\Collection;

class Logistics
{
    use LogTrait;

    /**
     * @param array $weightArray
     * @return Collection
     */
    protected function arrayToCollection(array $weightArray): Collection
    {
        $weights = collect($weightArray);

        return $weights;
    }

    /**
     * @param int $amount
     * @param array $weightArray
     * @param callable $closure
     * @return int
     */
    public function calculateFee(array $weightArray, int $amount, callable $closure): int
    {
        $weights = $this->arrayToCollection($weightArray);

        foreach ($weights as $weight) {
            $amount = $amount + $closure($weight);
        }

        $this->writeLog($amount);

        return $amount;
    }

}