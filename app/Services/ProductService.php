<?php

namespace App\Services;

use App\Models\ProductsModel;

class ProductService
{
    public function allProducts()
    {
        return ProductsModel::all();
    }

    public function Product($id)
    {
        return ProductsModel::find($id);
    }

    public function store($request)
    {
        $image = uploadImage($request);
        $product = new ProductsModel;
        $product->name = $request->name;
        $product->content = $request->content;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->image = $image;
        $product->created_at = NOW();
        $product->save();
    }

    public function update($request)
    {
        $image = $request->file('image');

        $product = ProductsModel::find($request->id);
        $product->name = $request->name;
        $product->content = $request->content;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->status = $request->status;

        if ($image) {
            $image = uploadImage($request);
            $product->image = $image;
        }

        $product->save();
    }

    public function delete($request)
    {
        $product = ProductsModel::find($request->id);
        $product->delete();
    }

    public function publishedProducts()
    {
        return ProductsModel::where('status',1)->get();
    }
}
