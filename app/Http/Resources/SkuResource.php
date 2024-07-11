<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request, $category = null): array
    {
        $user = session('loginUser');

        if ($user) {
            $price =  [
                'currency' => $this['price']['currency'],
                'consumer' => $this['price']['consumer'],
                'reseller' => $this['price']['reseller'],
                'user' => $this['price']['user'],
                'user_without_disc' => $this['price']['user_without_disc'],
                'commission' => $this['price']['commission'],
                'special_price' => isset($this['price']['special_price']) ? $this['price']['special_price'] : null,
            ];
        } else {
            $price =  [
                'currency' => $this['price']['currency'],
                'consumer' => $this['price']['consumer'],
                'reseller' => $this['price']['reseller'],
                'user' => $this['price']['user'],
                'user_without_disc' => $this['price']['user_without_disc'],
                'commission' => $this['price']['commission'],
                'special_price' => isset($this['price']['special_price']) ? $this['price']['special_price'] : null,
            ];
        }

        return [
            'code' => $this['code'],
            'properties' => $this['properties'],
            'price' => $price,
            'image_url' => $this['image_url'],
            'stock' => isset($this['stock']) ? $this['stock'] : null,
            'weight_gram' => $this['weight_gram'],
            'product_name' => isset($this['product_name']) ? $this['product_name'] : null,
            'sold' => isset($this['sold']) ? $this['sold'] : null,

            'category' => $category,
        ];
    }
}
