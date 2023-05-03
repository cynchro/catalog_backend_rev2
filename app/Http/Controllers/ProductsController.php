<?php

namespace App\Http\Controllers;

use App\Inmutables\ProductsInmutables;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(ProductService $service)
    {
        $products = $service->allProducts();

        return view('products.list', ['products' => $products]);
    }

    public function show(ProductService $service, ProductsInmutables $productsInmutables, $id)
    {
        $product = $service->Product($id);

        return view('products.show', ['product' => $product, 'status' => $productsInmutables->status(), 'id' => $id]);
    }

    public function edit(ProductService $service, ProductsInmutables $productsInmutables, $id)
    {
        $product = $service->Product($id);

        return view('products.edit', ['product' => $product, 'status' => $productsInmutables->status(), 'id' => $id]);
    }

    public function create(ProductsInmutables $productsInmutables)
    {
        return view('products.create', ['status' => $productsInmutables->status()]);
    }

    public function store(ProductService $service, Request $request)
    {
        $service->store($request);

        return back()->with('success', 'El producto fue creado exitosamente!');
    }

    public function update(ProductService $service, Request $request)
    {
        $service->update($request);

        return back()->with('success', 'El producto fue actualizado exitosamente!');
    }

    public function delete(ProductService $service, Request $request)
    {
        $service->delete($request);

        return back()->with('success', 'El producto fue borrado exitosamente!');
    }

    public function publishedProducts(ProductService $service)
    {
        return $service->publishedProducts();
    }
}
