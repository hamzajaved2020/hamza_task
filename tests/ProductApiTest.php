<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProductApiTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/products');

        $this->assertResponseIsSuccessful();
        $products = json_decode($client->getResponse()->getContent(), true);

        // Check that the currency is always EUR
        $this->assertAllProductsHaveCurrency('EUR',$products);

        // Check that products with no discount have price.final and price.original the same
        $this->assertProductsWithNoDiscountHaveMatchingPrices($products);

        // Check that products with a discount have price.original as the original price,
        // price.final as the amount with the discount applied, and discount_percentage
        // representing the applied discount with the % sign.
        $this->assertProductsWithDiscountHaveCorrectPrices($products);

    }

    private function assertAllProductsHaveCurrency(string $currency,$products)
    {
        foreach ($products['products'] as $product) {
            $this->assertEquals($currency, $product['price']['currency']);
        }
    }

    private function assertProductsWithNoDiscountHaveMatchingPrices($products)
    {
        foreach ($products['products'] as $product) {
            if ($product['price']['discountPercentage'] === null) {
                $this->assertEquals($product['price']['orignal'], $product['price']['final']);
            }
        }
    }

    private function assertProductsWithDiscountHaveCorrectPrices($products)
    {
        foreach ($products['products'] as $product) {
            if ($product['price']['discountPercentage'] !== null) {
                $discountPercentage = floatval($product['price']['discountPercentage']);
                $this->assertEquals(round($product['price']['orignal'] * (1 - $discountPercentage / 100)), $product['price']['final']);
            }
        }
    }
}
