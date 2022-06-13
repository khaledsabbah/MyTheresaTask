<?php


namespace Tests\Unit\Transformers;


use App\Hydrators\PriceHydrator;
use App\Transformers\PriceTransformer;
use Tests\Unit\MainTestCase;

class PriceTransformerTest extends MainTestCase
{
    protected $PriceTransformer;

    public function setUp(): void
    {
        parent::setUp();
        $entity= PriceHydrator::hydrate(["price"=>99]);;
        $this->PriceTransformer= PriceTransformer::transform([$entity])[0];
    }

    public function testTransformerReturnType()
    {
        $this->assertIsArray($this->PriceTransformer);
    }

    public function testTransformerAttributes()
    {
        $this->assertArrayHasKey("original", $this->PriceTransformer);
        $this->assertArrayHasKey("discount_percentage", $this->PriceTransformer);
        $this->assertArrayHasKey("final", $this->PriceTransformer);
        $this->assertArrayHasKey("currency", $this->PriceTransformer);

        $this->assertNotNull($this->PriceTransformer['original']);
        $this->assertNotNull($this->PriceTransformer['final']);
        $this->assertNotNull($this->PriceTransformer['currency']);
    }
}
