<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate();
        return new ProductCollection($products);
    }


    /**
     * Crear un nuevo producto
     *
     * @group Productos
     * @bodyParam name string required Nombre del producto. Example: Lente polarizado
     * @bodyParam price numeric required Precio del producto. Example: 99.99
     * @bodyParam detail string  required Descripción del producto. Example: Protección UV
     * @response 201 {
     *   "data": {
     *     "id": 1,
     *     "name": "Lente polarizado",
     *     "price": 99.99,
     *     "detail": "Protección UV"
     *   }
     * }
     */


    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        return (new ProductResource($product))->response()->setStatusCode(201);
    }
    

       /**
     * Actualizar un producto existente
     *
     * @group Productos
     * @urlParam id int required ID del producto. Example: 1
     * @bodyParam name string required Nombre del producto. Example: Lente antirreflejo
     * @bodyParam price numeric required Precio del producto. Example: 120.50
     * @bodyParam detail string required Descripción. Example: Lente con protección azul
     * @response 200 {
     *   "data": {
     *     "id": 1,
     *     "name": "Lente antirreflejo",
     *     "price": 120.5,
     *     "detail": "Lente con protección azul"
     *   }
     * }
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return new ProductResource($product);
    }

    /**
     * Eliminar un producto
     *
     * @group Productos
     * @urlParam id int required ID del producto. Example: 1
     * @response 204 {}
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
