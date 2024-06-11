<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(ProductRequest $request){
        $product = Product::create($request->all());

        $images = $request->file('images');
        foreach ($images as $image){
            $path = $image->store('public/');
            ProductImage::create([
                'product_id' => $product->id,
                'path' => str_replace('public/', '', $path),
            ]);
        }

        return redirect('product')->with('success', 'Product created successfully');
    }

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }

    public function delete(Product $product){
        $images = $product->images;
        if ($images != null){
            foreach ($images as $image){
                unlink('storage/'. $image->path);
                $image->delete();
            }
        }
        $product->delete();
        return back()->with('success', 'deleted successfully');
    }

    public function update(ProductRequest $request, Product $product){
        $product->update($request->all());

        $images = $request->file('images');
        foreach ($images as $image){
            $path = $image->store('public/productImage');
            $productImage = ProductImage::create([
                'product_id' => $product->id,
                'path' => str_replace('public/', '', $path),
            ]);
        }

        return redirect('product')->with('success', 'updated successfully');
    }
}
