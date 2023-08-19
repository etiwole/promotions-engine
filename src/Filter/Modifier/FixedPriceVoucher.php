<?php

namespace App\Filter\Modifier;

use App\DTO\PromotionsEnquiryInterface;
use App\Entity\Promotion;

class FixedPriceVoucher implements PriceModifierInterface
{
    public function modify(float $price, int $quantity, Promotion $promotion, PromotionsEnquiryInterface $enquiry): float
    {
        if ($enquiry->getVoucherCode() !== $promotion->getCriteria()['code']) {
            return $price * $quantity;
        }

        return $quantity * $promotion->getAdjustment();
    }
}