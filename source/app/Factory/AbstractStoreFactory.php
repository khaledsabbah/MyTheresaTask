<?php


namespace App\Factory;


use App\Contracts\IFactory;
use App\Contracts\IStore;
use App\Exceptions\StoreNotFoundException;

class AbstractStoreFactory implements IFactory
{

    /**
     * @param string $storeName
     * @param string $nameSpace
     * @return IStore
     * @throws StoreNotFoundException
     */
    static function Instantiate(string $storeName, string $nameSpace = ''): IStore
    {
        $service = self::STORE_NAMESPACE . ucfirst($storeName);
        if (class_exists($service)) {
            return new $service();
        }
        throw  new StoreNotFoundException($storeName);
    }
}
