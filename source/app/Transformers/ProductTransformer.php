<?php


namespace App\Transformers;


use App\Contracts\ITransform;

class ProductTransformer implements ITransform
{
    /**
     * @param array $products
     * @return array
     */
    public static function transform(array $products): array
    {
        $transformedProducts = [];
        foreach ($products as $product) {
            $transformedProducts[] = [
                "sku" => $product->getSku(),
                "name" => $product->getName(),
                "category" => $product->getCategory(),
                "price" => PriceTransformer::transform([$product->getPrice()])
            ];
        }
        return $transformedProducts;
    }


}
