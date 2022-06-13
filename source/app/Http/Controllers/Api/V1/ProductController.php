<?php


namespace App\Http\Controllers\Api\V1;


use App\Exceptions\StoreApiDownException;
use App\Exceptions\StoreNotFoundException;
use App\Http\Controllers\ApiController;
use App\Services\ProductService;
use App\Transformers\ProductTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends ApiController
{

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\StoreNotFoundException
     */
    public function index(Request $request)
    {
        try {
            parse_str($request->getQueryString(), $queryStrings);
            $products = $this->service
                ->loadProductsFromStore()
                ->implementDiscounts()
                ->applyFilters($queryStrings)
                ->paginate($request->page,$request->limit??5);
            return $this->respond(ProductTransformer::transform($products));
        } catch (StoreApiDownException $storeApiDownException) {
            return $this->respondBadRequest($storeApiDownException->getMessage());
        } catch (StoreNotFoundException $storeNotFoundException) {
            return $this->respondBadRequest($storeNotFoundException->getMessage());
        } catch (\Exception $exception) {
            Log::error($exception);
            return $this->respondBadRequest("Some Thing Went Wrong");
        }
    }
}
