<?php

namespace App\DTO;

class LowestPriceEnquiry implements PromotionsEnquiryInterface
{
    private ?int $quantity;

    private ?string $requestLocation;

    private ?string $voucherCode;

    private ?string $requestDate;

    private ?int $productId;

    private ?float $price;

    private ?float $discountPrice;

    private ?int $promotionId;

    private ?string $promotionName;

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getRequestLocation(): ?string
    {
        return $this->requestLocation;
    }

    /**
     * @param string|null $requestLocation
     */
    public function setRequestLocation(?string $requestLocation): void
    {
        $this->requestLocation = $requestLocation;
    }

    /**
     * @return string|null
     */
    public function getVoucherCode(): ?string
    {
        return $this->voucherCode;
    }

    /**
     * @param string|null $voucherCode
     */
    public function setVoucherCode(?string $voucherCode): void
    {
        $this->voucherCode = $voucherCode;
    }

    /**
     * @return string|null
     */
    public function getRequestDate(): ?string
    {
        return $this->requestDate;
    }

    /**
     * @param string|null $requestDate
     */
    public function setRequestDate(?string $requestDate): void
    {
        $this->requestDate = $requestDate;
    }

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     */
    public function setProductId(?int $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float|null
     */
    public function getDiscountPrice(): ?float
    {
        return $this->discountPrice;
    }

    /**
     * @param float|null $discountPrice
     */
    public function setDiscountPrice(?float $discountPrice): void
    {
        $this->discountPrice = $discountPrice;
    }

    /**
     * @return int|null
     */
    public function getPromotionId(): ?int
    {
        return $this->promotionId;
    }

    /**
     * @param int|null $promotionId
     */
    public function setPromotionId(?int $promotionId): void
    {
        $this->promotionId = $promotionId;
    }

    /**
     * @return string|null
     */
    public function getPromotionName(): ?string
    {
        return $this->promotionName;
    }

    /**
     * @param string|null $promotionName
     */
    public function setPromotionName(?string $promotionName): void
    {
        $this->promotionName = $promotionName;
    }
}