<?php


namespace Tests\Unit\Transformers;


use App\Hydrators\ProductHydrator;
use App\Transformers\ProductTransformer;
use Tests\Unit\MainTestCase;

class ProductTransformerTest extends MainTestCase
{

    protected $ProductTransformer;

    public function setUp(): void
    {
        parent::setUp();
        $entity= ProductHydrator::hydrate($this->oneProduct);;
        $this->ProductTransformer= ProductTransformer::transform([$entity])[0];
    }

    public function testTransformerReturnType()
    {
        $this->assertIsArray($this->ProductTransformer);
    }

    public function testTransformerAttributes()
    {
        $this->assertArrayHasKey("sku", $this->ProductTransformer);
        $this->assertArrayHasKey("name", $this->ProductTransformer);
        $this->assertArrayHasKey("category", $this->ProductTransformer);
        $this->assertArrayHasKey("price", $this->ProductTransformer);
        $this->assertIsArray( $this->ProductTransformer['price']);
    }
}
