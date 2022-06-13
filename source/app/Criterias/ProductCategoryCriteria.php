<?php


namespace App\Criterias;


use App\Contracts\ICriteria;

class ProductCategoryCriteria implements ICriteria
{
    public static function meetCriteria(array $products, $filterValue): array
    {
        $filteredProducts = [];
        foreach ($products as $product) {
            if ($product->getCategory() == "$filterValue")
                array_push($filteredProducts, $product);
        }
        return $filteredProducts;
    }


}
