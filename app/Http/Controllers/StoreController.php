<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $pFeatured  = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }
    
    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::ofCategory($id)->get();
        
        return view('store.category', compact('categories', 'category', 'products'));
    }
    
    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        
        return view('store.product', compact('categories', 'product'));
    }
}
