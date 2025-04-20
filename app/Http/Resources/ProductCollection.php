<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->transform(function ($product) {
                return [
                    'id'     => $product->id,
                    'name'   => $product->name,
                    'price'  => $product->price,
                    'detail' => $product->detail,
                ];
            }),
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'total' => $this->collection->count(),
            ],
        ];
    }
}
