<?php


namespace App\Services;


use App\Factory\AbstractStoreFactory;
use App\Repositories\ProductRepository;

class ProductService
{
    /**
     * @var array
     */
    protected $products;

    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * ProductService constructor.
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return mixed
     */
    public function getProducts(): array
    {
        return $this->products;

    }

    /**
     * @param mixed $products
     */
    protected function setProducts($products): ProductService
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return array|mixed
     * @throws \App\Exceptions\StoreNotFoundException
     */
    public function loadProductsFromStore()
    {
        $this->setProducts(AbstractStoreFactory::Instantiate("mytheresa")->mockStoreResponse());
        return $this;
    }

    /**
     * Apply Discounts On Products Returned
     * @return $this
     */
    public function implementDiscounts()
    {
        $this->setProducts($this->repository->calculateDiscountsOnProducts($this->getProducts()));
        return $this;
    }


    public function applyFilters($filters)
    {
        $filteredProducts = $this->repository->filterProducts($filters, $this->getProducts());
        $this->setProducts($filteredProducts);
        return $this;
    }

    public function paginate($page = 1, $limit=5)
    {
        $products= collect($this->getProducts());
        return $products->forPage($page,$limit)->all();
    }


}
