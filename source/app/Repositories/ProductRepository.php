<?php


namespace App\Repositories;


use App\Criterias\PriceLessThanCriteria;
use App\Criterias\ProductCategoryCriteria;
use App\Criterias\ProductHasDiscountCriteria;

class ProductRepository
{

    public function calculateDiscountsOnProducts($products)
    {
        $productsWithDiscounts = [];
        foreach ($products as $product) {
            $discountsOnProduct = [];
            if ($product->getSku() == "000003")
                array_push($discountsOnProduct, 15);
            if ($product->getCategory() == "boots")
                array_push($discountsOnProduct, 30);

            if (count($discountsOnProduct) > 0) {
                $product->applyDiscount(max($discountsOnProduct));
            }
            array_push($productsWithDiscounts, $product);
        }
        return $productsWithDiscounts;
    }

    public function filterProducts($filters, $products)
    {
        $filteredProducts = $products;
        foreach ($filters as $filter => $filterValue) {
            switch (strtolower($filter)) {
                case "category":
                    $filteredProducts = ProductCategoryCriteria::meetCriteria($filteredProducts, $filterValue);
                    break;
                case "pricelessthan":
                    $filteredProducts = PriceLessThanCriteria::meetCriteria($filteredProducts, $filterValue);
                    break;
                case "hasdiscount":
                    $filteredProducts = ProductHasDiscountCriteria::meetCriteria($filteredProducts, $filterValue);
                    break;
            }
        }
        return $filteredProducts;
    }
}
