<?php

namespace App\Filter;

use App\DTO\PromotionsEnquiryInterface;
use App\Entity\Promotion;

interface PromotionsFilterInterface
{
    public function apply(PromotionsEnquiryInterface $enquiry, Promotion ...$promotion): PromotionsEnquiryInterface;
}