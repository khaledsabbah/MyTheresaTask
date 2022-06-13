<?php


namespace App\Transformers;


use App\Contracts\ITransform;

class PriceTransformer implements ITransform
{
    /**
     * @param array $prices
     * @return array
     */
    public static function transform(array $prices): array
    {
        $transformedPrice = [];
        foreach ($prices as $price) {
            $transformedPrice[] = [
                "original" => $price->getOriginal(),
                "final" => $price->getFinal(),
                "discount_percentage" => $price->getDiscountPercentage() ? $price->getDiscountPercentage() . " %" : null,
                "currency" => $price->getCurrency()
            ];
        }
        return $transformedPrice;
    }


}
