<?php


namespace App\Contracts;


interface IStore
{
    /**
     * @return array
     */
    public function getStoreProducts(): array;

    /**
     * @return array
     */
    public function mockStoreResponse(): array;
}
