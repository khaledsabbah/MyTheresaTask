<?php


namespace Tests\Unit\Hydrators;


use App\Contracts\IEntity;
use App\Hydrators\PriceHydrator;
use App\Hydrators\ProductHydrator;
use Tests\Unit\MainTestCase;

class PriceHydratorTest extends MainTestCase
{
    protected $entity;

    public function setUp(): void
    {
        parent::setUp();
        $this->entity= PriceHydrator::hydrate(["price"=>99]);
    }

    public function testPriceHydratorReturnObj()
    {
        $this->assertInstanceOf(IEntity::class,$this->entity,"Price Hydrator Must return Object of class that implement IEntity");
    }


    public function testProductHydratorObjAttributes()
    {
        $this->assertObjectHasAttribute("original",$this->entity);
        $this->assertObjectHasAttribute("discountPercentage",$this->entity);
        $this->assertObjectHasAttribute("final",$this->entity);
        $this->assertObjectHasAttribute("currency",$this->entity);
        $this->assertNotNull($this->entity->getOriginal());
        $this->assertNotNull($this->entity->getFinal());
        $this->assertNotNull($this->entity->getCurrency());
    }

}
