<?php

namespace App\Services;

use Illuminate\Support\Collection;

abstract class AbstractLogistics implements LogisticsInterface
{
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
     * @param Collection $weights
     * @param callable $closure
     * @return int
     */
    protected function loopWeights(int $amount, Collection $weights, callable $closure): int
    {
        foreach ($weights as $weight) {
            $amount = $amount + $closure($weight);
        }

        return $amount;
    }
}