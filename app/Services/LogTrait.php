<?php

namespace App\Services;

use Log;

trait LogTrait
{
    public function writeLog(int $amount)
    {
        Log::info('Amount : ' . $amount);
    }
}