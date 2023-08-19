<?php

namespace App\Filter\Modifier;

use App\DTO\PromotionsEnquiryInterface;
use App\Entity\Promotion;

class DateRangeModifier implements PriceModifierInterface
{

    public function modify(float $price, int $quantity, Promotion $promotion, PromotionsEnquiryInterface $enquiry): float
    {
        $requestDate = date_create($enquiry->getRequestDate());
        $from = date_create($promotion->getCriteria()['from']);
        $to = date_create($promotion->getCriteria()['to']);

        if ($requestDate < $from || $requestDate >= $to) {
            return $price * $quantity;
        }

        return $price * $quantity * $promotion->getAdjustment();
    }
}