<?php

namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Entity\Promotion;
use App\Filter\LowestPriceFilter;
use App\Tests\ServiceTestCase;

class LowestPriceFilterTest extends ServiceTestCase
{
    /** @test */
    public function lowest_price_promotions_filtering_is_applied_correctly(): void
    {
        // Given
        $enquiry = new LowestPriceEnquiry();

        $promotions = $this->promotionsDataProvider();

        $lowestPriceFilter = $this->container->get(LowestPriceFilter::class);

        // When
        $filteredEnquiry = $lowestPriceFilter->apply($enquiry, ...$promotions);

        //Then
        $this->assertSame(200.0, $filteredEnquiry->getPrice());
        $this->assertSame(50.0, $filteredEnquiry->getDiscountPrice());
        $this->assertSame('Black Friday half price sale', $filteredEnquiry->getPromotionName());
    }

    private function promotionsDataProvider(): array
    {
        $promotionOne = new Promotion();
        $promotionOne->setName('Black Friday half price sale');
        $promotionOne->setAdjustment(0.5);
        $promotionOne->setCriteria(["to" => "2023-08-18", "from" => "2023-09-18"]);
        $promotionOne->setType('date_range_multiplier');

        $promotionTwo = new Promotion();
        $promotionTwo->setName('Voucher 0U812');
        $promotionTwo->setAdjustment(100);
        $promotionTwo->setCriteria(["code" => "0U812"]);
        $promotionTwo->setType('fixed_price_voucher');

        $promotionThree = new Promotion();
        $promotionTwo->setName('Buy one get one free');
        $promotionTwo->setAdjustment(0.5);
        $promotionTwo->setCriteria(["minimum_quantity" => 2]);
        $promotionTwo->setType('even_items_multiplier');

        return [$promotionOne, $promotionTwo, $promotionThree];
    }
}