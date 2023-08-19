<?php

namespace App\Filter\Modifier;

use App\DTO\PromotionsEnquiryInterface;
use App\Entity\Promotion;

interface PriceModifierInterface
{
    public function modify(float $price, int $quantity, Promotion $promotion, PromotionsEnquiryInterface $enquiry): float;
}