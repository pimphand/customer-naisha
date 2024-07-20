<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd(session('loginUser')['customer_type_id']);
        // return parent::toArray($request);
        $sku = [];
        foreach ($this['skus'] as $key => $skus) {
            // if ($this['category']['id'] == 12 && session()->has('loginUser') && session('loginUser')['customer_type_id'] == 15 && $skus['price']['consumer'] <= 10000) {
            //     $sku[] = [
            //         'code' => $skus['code'],
            //         'properties' => $skus['properties'],
            //         'image_url' => $skus['image_url'],
            //         'stock' => isset($skus['stock']) ? $skus['stock'] : null,
            //         'weight_gram' => $skus['weight_gram'],
            //         'product_name' => isset($skus['product_name']) ? $skus['product_name'] : null,
            //         'sold' => isset($skus['sold']) ? $skus['sold'] : null,
            //         'price' => [
            //             'currency' => $skus['price']['currency'],
            //             'consumer' => 0,
            //             'reseller' => 0,
            //             'user' => 0,
            //             'user_without_disc' => 0,
            //             'commission' => 0,
            //             'special_price' => 0,
            //             'price_web' => 0,
            //         ],
            //     ];
            // } else {

            // }
            $sku[] = [
                'code' => $skus['code'],
                'properties' => $skus['properties'],
                'image_url' => $skus['image_url'],
                'stock' => isset($skus['stock']) ? $skus['stock'] : null,
                'weight_gram' => $skus['weight_gram'],
                'product_name' => isset($skus['product_name']) ? $skus['product_name'] : null,
                'sold' => isset($skus['sold']) ? $skus['sold'] : null,
                'price' => [
                    'currency' => $skus['price']['currency'],
                    'consumer' => $skus['price']['consumer'],
                    'reseller' => $skus['price']['reseller'],
                    'user' => $skus['price']['user'],
                    'user_without_disc' => $skus['price']['user_without_disc'],
                    'commission' => $skus['price']['commission'],
                    'special_price' => isset($skus['price']['special_price']) ? $skus['price']['special_price'] : null,
                    'price_web' => isset($skus['price']['price_web']) ? $skus['price']['price_web'] : null,
                ],
            ];
        }

        return [
            'name' => $this['name'],
            'tags' => $this['tags'],
            'slug' => $this['slug'],
            'image_url' => $this['image_url'],
            'skus' => $sku,
            'commission' => $this['commission'],
            'ref_price' => $this['ref_price'],
            'category' => $this['category'],
            'id' => $this['id'],
            'last_stock' => $this['last_stock'],
            'description' => isset($this['description']) ? $this['description'] : null,
            'min_price' => isset($this['min_price']) ? $this['min_price'] : null,
            'max_price' => isset($this['max_price']) ? $this['max_price'] : null,
        ];
    }
}
