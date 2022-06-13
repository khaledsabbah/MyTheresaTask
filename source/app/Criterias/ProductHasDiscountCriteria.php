<?php


namespace App\Criterias;


use App\Contracts\ICriteria;

class ProductHasDiscountCriteria implements ICriteria
{
    public static function meetCriteria(array $products, $filterValue): array
    {
        $filteredProducts = [];
        foreach ($products as $product) {
            switch ($filterValue) {
                case 0:
                    if (is_null($product->getPrice()->getDiscountPercentage()))
                        array_push($filteredProducts, $product);
                    break;
                case 1:
                    if ($product->getPrice()->getDiscountPercentage())
                        array_push($filteredProducts, $product);
                    break;
            }
        }
        return $filteredProducts;
    }


}
