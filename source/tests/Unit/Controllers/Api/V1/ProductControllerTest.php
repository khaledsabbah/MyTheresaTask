<?php


namespace Tests\Unit\Controllers\Api\V1;


use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Tests\Unit\MainTestCase;

class ProductControllerTest extends TestCase
{
    function testProductsResponse()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response = $this->getJson("/products");
        $response->assertJson(function (AssertableJson $json) {
            return $json->has('data');
        });
        $response->assertJsonPath("data.0.sku","000001");
        $response->assertJsonPath("data.0.category","boots");
    }

    public function testProductsCategoryFilter()
    {
        $response = $this->getJson('/products?category=boots');
        $response->assertStatus(200);
        $products= $response->json()['data'];
        foreach ($products as $product){
            $this->assertEquals("boots",$product['category']);
        }
    }

    public function testProductsPriceLessThanFilter()
    {
        $value=71000;
        $response = $this->getJson('/products?priceLessThan='.$value);
        $response->assertStatus(200);
        $products= $response->json()['data'];
        foreach ($products as $product){
            $this->assertLessThanOrEqual($value,$product['price'][0]['original']);
        }
    }

    public function testProductsHasDiscountThanFilter()
    {
        $hasDiscount=1;
        $response = $this->getJson('/products?hasDiscount='.$hasDiscount);
        $response->assertStatus(200);
        $products= $response->json()['data'];
        foreach ($products as $product){
            $this->assertNotNull($product['price'][0]['discount_percentage']);
        }
    }

    public function testProductsDoesntHasDiscountThanFilter()
    {
        $hasDiscount=0;
        $response = $this->getJson('/products?hasDiscount='.$hasDiscount);
        $response->assertStatus(200);
        $products= $response->json()['data'];
        foreach ($products as $product){
            $this->assertNull($product['price'][0]['discount_percentage']);
        }
    }

}
