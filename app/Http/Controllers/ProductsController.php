<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;

class ProductsController extends Controller
{
    private $productModel;
    
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }
    
    public function index()
    {
        $products = $this->productModel->all();
        
        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
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
    
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        
        return view('products.edit', compact('product'));
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
}
