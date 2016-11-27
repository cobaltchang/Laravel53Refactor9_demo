<?php

use App\Services\ShippingService;

class ShippingServiceTest extends TestCase
{
    /** @test */
    public function 黑貓_當重量為1_2_3時_費用為360()
    {
        /** arrange */
        /** @var ShippingService $target */
        $target = App::make(ShippingService::class);

        /** act */
        $weights = [1, 2, 3];
        $actual = $target->calculateFee($weights, 'BlackCat');

        /** assert */
        $expected = 360;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 新竹_當重量為1_2_3時_費用為330()
    {
        /** arrange */
        /** @var ShippingService $target */
        $target = App::make(ShippingService::class);

        /** act */
        $weights = [1, 2, 3];
        $actual = $target->calculateFee($weights, 'Hsinchu');

        /** assert */
        $expected = 330;
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function 郵局_當重量為1_2_3時_費用為300()
    {
        /** arrange */
        /** @var ShippingService $target */
        $target = App::make(ShippingService::class);

        /** act */
        $weights = [1, 2, 3];
        $actual = $target->calculateFee($weights, 'PostOffice');

        /** assert */
        $expected = 300;
        $this->assertEquals($expected, $actual);
    }
}
