<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Lunar\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->where('status', 'published')
            ->whereHas('variants')
            ->with([
                'variants' => function ($query) {
                    $query
                        ->select([
                            'id',
                            'product_id',
                            'sku',
                            'stock',
                            'shippable',
                            'backorder',
                            'purchasable',
                            'attribute_data',
                            'created_at',
                            'updated_at',
                        ])
                        ->with([
                            'prices' => fn ($query) => $query->with(['currency', 'priceable']),
                        ]);
                },
            ])
            ->oldest()
            ->limit(10)
            ->get();

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        $product
            ->load(['variants' => function ($query) {
                $query
                    ->select([
                        'id',
                        'product_id',
                        'sku',
                        'stock',
                        'shippable',
                        'backorder',
                        'purchasable',
                        'attribute_data',
                        'created_at',
                        'updated_at',
                    ])
                    ->with([
                        'prices' => fn ($query) => $query->with(['currency', 'priceable']),
                    ]);
            },
            ])
            ->loadMedia('products');

        return new ProductResource($product);
    }
}
