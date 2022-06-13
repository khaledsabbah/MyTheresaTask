<?php


namespace Tests\Unit\Factory;


use App\Exceptions\StoreNotFoundException;
use App\Factory\AbstractStoreFactory;
use App\Stores\Mytheresa;
use Tests\Unit\MainTestCase;

class AbstractStoreFactoryTest extends MainTestCase
{
    function testStoreNotFoundException(){
        $this->expectException(StoreNotFoundException::class);
        AbstractStoreFactory::Instantiate("NoStore");
    }

    function testStoreObjectReturnedFromFactory(){
        $store= AbstractStoreFactory::Instantiate("mytheresa");
        $this->assertInstanceOf(Mytheresa::class, $store);
        $this->assertObjectHasAttribute("products",$store);
        $this->assertIsArray($store->getStoreProducts());

    }
}
