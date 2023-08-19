<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Entity\Promotion;
use App\Filter\Modifier\DateRangeModifier;
use App\Filter\Modifier\FixedPriceVoucher;
use App\Tests\ServiceTestCase;

class PriceModifiersTest extends ServiceTestCase
{
    /** @test */
    public function DateRangeMultiplier_returns_a_correctly_modified_price()
    {
        // Given
        $enquiry = new LowestPriceEnquiry();
        $enquiry->setQuantity(5);
        $enquiry->setRequestDate('2023-08-20');

        $promotion = new Promotion();
        $promotion->setName('Black Friday half price sale');
        $promotion->setAdjustment(0.5);
        $promotion->setCriteria(["to" => "2023-10-18", "from" => "2023-08-18"]);
        $promotion->setType('date_range_multiplier');

        $dateRangeMultiplier = new DateRangeModifier();

        // When
        $modifiedPrice = $dateRangeMultiplier->modify(100, 5, $promotion, $enquiry);

        // Then
        $this->assertEquals(250.0, $modifiedPrice);
    }

    /** @test */
    public function FixedPriceVoucher_returns_a_correctly_modified_price()
    {
        // Given
        $enquiry = new LowestPriceEnquiry();
        $enquiry->setQuantity(5);
        $enquiry->setVoucherCode('0U812');

        $promotion = new Promotion();
        $promotion->setName('Voucher 0U812');
        $promotion->setAdjustment(100);
        $promotion->setCriteria(["code" => "0U812"]);
        $promotion->setType('fixed_price_voucher');

        $modifier = new FixedPriceVoucher();

        // When
        $modifiedPrice = $modifier->modify(100, 5, $promotion, $enquiry);

        // Then
        $this->assertEquals(500, $modifiedPrice);
    }
}