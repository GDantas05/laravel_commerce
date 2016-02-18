<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;

class ProductsController extends Controller
{
    private $productModel;
    
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }
    
    public function index()
    {
        $products = $this->productModel->paginate(10);
        
        return view('products.index', compact('products'));
    }
    
    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        
        return view('products.create', compact('categories'));
    }
    
    public function store(Requests\ProductRequest $request)
    {
        if (!$request['recommend']) {
            $request['recommend'] = 0;
        }
        
        if (!$request['featured']) {
            $request['featured'] = 0;
        }
        
        $input = $request->all();
        
        $product = $this->productModel->fill($input);
        $product->save();
        
        return redirect()->route('products');
    }
    
    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);
        
        return view('products.edit', compact('product', 'categories'));
    }
    
    public function update(Requests\ProductRequest $request, $id)
    {
        if (!$request['recommend']) {
            $request['recommend'] = 0;
        }
        
        if (!$request['featured']) {
            $request['featured'] = 0;
        }
        
        $this->productModel->find($id)->update($request->all());
        
        return redirect()->route('products');
    }
    
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        
        return redirect()->route('products');
    }
    
    public function images($id)
    {
        $product = $this->productModel->find($id);
        
        return view('products.images', compact('product'));
    }
    
    public function createImage($id)
    {
        $product = $this->productModel->find($id);
        
        return view('products.create_image', compact('product'));
    }
    
    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        
        $image = $productImage::create(['product_id' => $id, 'extension' => $extension]);
        
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        
        return redirect()->route('products.images', ['id' => $id]);
    }
    
    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);
        
        if (file_exists(public_path('uploads/'.$image->id.'.'.$image->extension))) {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);    
        }
        
        $product = $image->product;
        $image->delete();
        
        return redirect()->route('products.images', ['id' => $product->id]);
    }
}
