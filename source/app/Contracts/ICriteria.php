<?php


namespace App\Contracts;


/**
 * Interface ICriteria
 * @package App\Contracts
 */
interface ICriteria
{

    /**
     * @param array $products
     * @param string $filterValue
     * @return array
     */
    public static function meetCriteria(array $products, string $filterValue): array;
}
