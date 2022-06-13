<?php


namespace App\Stores;


use App\Contracts\IStore;
use App\Exceptions\StoreApiDownException;
use App\Hydrators\ProductHydrator;
use GuzzleHttp\Client;

abstract class AbstractStore implements IStore
{
    /**
     * @var mixed array
     */
    protected $products;

    /**
     * @var array
     */
    protected $hydratedProducts = [];

    /**
     * AbstractAdvertiser constructor.
     */
    public function __construct()
    {
        try {
            $response = $this->getStoreProducts();
            if (isset($response['products']))
                $this->products = $response['products'];
        } catch (\Exception $exception) {
            throw new StoreApiDownException(static::API_URL, static::STORE_NAME);
        }

    }

    /**
     * Load Products From External API
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getStoreProducts(): array
    {
        $client = new Client();
        $response = $client->request('GET', static::API_URL);
        return json_decode($response->getBody(), true);
    }

    /**
     * Hydrate Response into Products Entities
     * @return array
     */
    public function mockStoreResponse(): array
    {
        foreach ($this->products as $product) {
            $productHydrator = ProductHydrator::hydrate($product);
            array_push($this->hydratedProducts, $productHydrator);
        }
        return $this->hydratedProducts;
    }


}
