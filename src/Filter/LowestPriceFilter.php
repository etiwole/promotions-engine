<?php

namespace App\Filter;

use App\DTO\PromotionsEnquiryInterface;
use App\Entity\Promotion;

class LowestPriceFilter implements PromotionsFilterInterface
{
    public function apply(PromotionsEnquiryInterface $enquiry, Promotion ...$promotion): PromotionsEnquiryInterface
    {
        $enquiry->setDiscountPrice(50);
        $enquiry->setPrice(200);
        $enquiry->setPromotionId(3);
        $enquiry->setPromotionName('Black Friday half price sale');

        return $enquiry;
    }
}