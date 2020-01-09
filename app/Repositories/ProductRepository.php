<?php

namespace App\Repositories;

use App\Models\Product;
use App\Components\Uploadble;
use Illuminate\Http\UploadedFile;
use App\Interfaces\ProductInterface;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ProductRepository extends BaseRepository implements ProductInterface
{
    use Uploadble;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function findProductById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    public function createProduct(array $params)
    {
        try {
            $collection = collect($params);
            $featured = $collection->has('featured') ? 1 : 0;
            $status = $collection->has('status') ? 1 : 0;
            $merge = $collection->merge(compact('status', 'featured'));
            $product = new Product($merge->all());
            $product->save();
            if ($collection->has('categories')) {
                $product->categories()->sync($params['categories']);
            }
            return $product;
        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['product_id']);
        $collection = collect($params)->except('_token');
        $featured = $collection->has('featured') ? 1 : 0;
        $status = $collection->has('status') ? 1 : 0;
        $merge = $collection->merge(compact('status', 'featured'));
        $product->update($merge->all());

        if ($collection->has('categories')) {
            $product->categories()->sync($params['categories']);
        }

        return $product;
    }

    public function deleteProduct(int $id)
    {
        $product = $this->findProductById($id);
        $product->delete();
        return $product;
    }

    public function findProductByName($name)
    {
        $product = Product::where('name', $name)->first();
        return $product;
    }

    public function listFeaturedProducts()
    {
        return Product::where('featured', 1)->get();
    }

    public function findProductsByName($name)
    {
        error_log($name);
        $product = Product::where('name', 'LIKE', '%'.$name.'%')->get();
        return $product;
    }
}
