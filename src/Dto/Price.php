<?php

namespace App\Dto;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JetBrains\PhpStorm\Pure;

class Price
{
    private string $orignal;
    private string $final;
    private string|null $discount_percentage;
    private string $currency;

    #[Pure] public function __construct()
    {
    }


    public static function of(string $orignal,string $final,string|null $discount_percentage,string $currency): Price
    {
        $price = new Price();
        $price->setOrignal($orignal);
        $price->setFinal($final);
        $price->setDiscountPercentage($discount_percentage);
        $price->setCurrency($currency);
        return $price;
    }

    /**
     * @return string
     */
    public function getOrignal(): string
    {
        return $this->orignal;
    }

    /**
     * @param string $orignal
     */
    public function setOrignal(string $orignal): void
    {
        $this->orignal = $orignal;
    }

    /**
     * @return string
     */
    public function getFinal(): string
    {
        return $this->final;
    }

    /**
     * @param string $final
     */
    public function setFinal(string $final): void
    {
        $this->final = $final;
    }

    /**
     * @return string|null
     */
    public function getDiscountPercentage(): string|null
    {
        return $this->discount_percentage;
    }

    /**
     * @param string | null $discount_percentage
     */
    public function setDiscountPercentage(string|null $discount_percentage): void
    {
        $this->discount_percentage = $discount_percentage;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }


}