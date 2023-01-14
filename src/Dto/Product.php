<?php

namespace App\Dto;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JetBrains\PhpStorm\Pure;

class Product
{
    private Price $price;
    private string $sku;
    private string $name;
    private string $category;

    #[Pure] public function __construct()
    {
        $this->content = new ArrayCollection();
    }


    public static function of(Price $price, string $sku, string $name,string $category): Product
    {
        $product = new Product();
        $product->setPrice($price);
        $product->setSku($sku);
        $product->setName($name);
        $product->setCategory($category);

        return $product;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     */
    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }



}