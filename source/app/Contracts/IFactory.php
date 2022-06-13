<?php

namespace App\Contracts;


/**
 * Interface IFactory
 *
 * @package App\Contracts
 */
interface IFactory
{
    /**
     * DEFAULT STORE NAMESPACE
     */
    const STORE_NAMESPACE = "App\Stores\\";

    /**
     * @param string $storeName
     * @param string $nameSpace
     * @return IStore
     */
    static function Instantiate(string $storeName, string $nameSpace = ''): IStore;
}
