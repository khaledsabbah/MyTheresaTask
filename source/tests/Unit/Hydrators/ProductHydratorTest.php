<?php


namespace Tests\Unit\Hydrators;


use App\Contracts\IEntity;
use App\Hydrators\ProductHydrator;
use Tests\Unit\MainTestCase;

class ProductHydratorTest extends MainTestCase
{
    protected $entity;

    public function setUp(): void
    {
        parent::setUp();
        $this->entity= ProductHydrator::hydrate($this->oneProduct);
    }

    public function testProductHydratorReturnObj()
    {
        $this->assertInstanceOf(IEntity::class,$this->entity,"Product Hydrator Must return Object of class that implement IEntity");
    }


    public function testProductHydratorObjAttributes()
    {
        $this->assertObjectHasAttribute("name",$this->entity);
        $this->assertObjectHasAttribute("category",$this->entity);
        $this->assertObjectHasAttribute("sku",$this->entity);
        $this->assertObjectHasAttribute("price",$this->entity);

        $this->assertIsObject($this->entity->getPrice());
        $this->assertNotNull($this->entity->getName());
        $this->assertNotNull($this->entity->getSku());
        $this->assertNotNull($this->entity->getPrice());
    }
}
