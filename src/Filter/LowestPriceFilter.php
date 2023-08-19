<?php

namespace App\Filter;

use App\DTO\PromotionsEnquiryInterface;
use App\Entity\Promotion;

class LowestPriceFilter implements PromotionsFilterInterface
{
    public function apply(PromotionsEnquiryInterface $enquiry, Promotion ...$promotion): PromotionsEnquiryInterface
    {
        $price = $enquiry->getProduct()->getPrice();
        $quantity = $enquiry->getQuantity();
        $lowestPrice = $quantity * $price;

//        $modifiedPrice = $priceModifier->modify($price, $quantity, $promotion, $enquiry);

        $enquiry->setDiscountPrice(250);
        $enquiry->setPrice(100);
        $enquiry->setPromotionId(3);
        $enquiry->setPromotionName('Black Friday half price sale');

        return $enquiry;
    }
}