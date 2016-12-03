<?php

use App\Services\ShippingService;

class ShippingServiceTest extends TestCase
{
    /** @test */
    public function 黑貓_當重量為1_2_3時_費用為360()
    {
        /** arrange */

        /** act */
        $weights = [1, 2, 3];
        $actual = App::call(ShippingService::class . '@calculateFee', [
            'weightArray' => $weights,
            'closure'     => function (int $weight) {
                return (100 + $weight * 10);
            },
        ]);

        /** assert */
        $expected = 360;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 新竹_當重量為1_2_3時_費用為330()
    {
        /** arrange */

        /** act */
        $weights = [1, 2, 3];
        $actual = App::call(ShippingService::class . '@calculateFee', [
            'weightArray' => $weights,
            'closure'     => function (int $weight) {
                return (80 + $weight * 15);
            },
        ]);

        /** assert */
        $expected = 330;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 郵局_當重量為1_2_3時_費用為300()
    {
        /** arrange */

        /** act */
        $weights = [1, 2, 3];
        $actual = App::call(ShippingService::class . '@calculateFee', [
            'weightArray' => $weights,
            'closure'     => function (int $weight) {
                return (60 + $weight * 20);
            },
        ]);

        /** assert */
        $expected = 300;
        $this->assertEquals($expected, $actual);
    }
}
