<?php


namespace App\Hydrators;


use App\Contracts\IEntity;
use App\Contracts\IHydrate;
use App\Entities\Product;

class ProductHydrator implements IHydrate
{

    public static function hydrate(array $data): IEntity
    {
        $product = new Product();
        $product->setName($data['name'] ?? "");
        $product->setCategory($data['category'] ?? "");
        $product->setPrice(PriceHydrator::hydrate($data));
        $product->setSku($data['sku'] ?? "");
        return $product;
    }

}
