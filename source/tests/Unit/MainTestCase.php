<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;

class MainTestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $products;
    protected $oneProduct;

    public function setUp() :void
    {
        $products = file_get_contents("tests/test_inputs/test_products.json");
        $product = file_get_contents("tests/test_inputs/product.json");
        $this->products= json_decode($products, true);
        $this->oneProduct= json_decode($product, true);
    }
}
