<?php


namespace App\Hydrators;


use App\Contracts\IEntity;
use App\Contracts\IHydrate;
use App\Entities\PriceEntity;

class PriceHydrator implements IHydrate
{

    public static function hydrate(array $data): IEntity
    {
        $priceEntity = new PriceEntity();
        $priceEntity->setOriginal($data['price'] ?? "");
        $priceEntity->setCurrency("EUR");
        return $priceEntity;
    }

}
