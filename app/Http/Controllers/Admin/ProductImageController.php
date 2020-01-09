<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Components\Uploadble;
use Illuminate\Http\UploadedFile;
use App\Models\ProductImage;
use App\Interfaces\ProductInterface;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    use Uploadble;

    protected $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function upload(Request $request)
    {
        $product = $this->productRepository->findProductById($request->product_id);
        $image = null;

        if ($request->has('image')) {
            error_log('Something right here.\n '. $request);
            $image = $this->uploadOne($request->image, 'products');

            $productImage = new ProductImage([
                'product_id' => $request->product_id,
                'fullimage'      =>  $image,
            ]);
            
            
            $product->images()->save($productImage);
            error_log('Something right here.\n '. $product->images());
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete($id)
    {
        $image = ProductImage::findOrFail($id);

        if ($image->fullimage != '') {
            $this->deleteOne($image->fullimage);
        }
        $image->delete();

        return redirect()->back();
    }
}
