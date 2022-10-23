<?php

namespace App\Http\Resources\Exponent;

use App\Models\Exponent;

class ExponentResource extends ExponentNoRelationsResource
{
    public function toArray($request)
    {
        /** @var Exponent|self $this */
        return array_merge(parent::toArray($request), [
            'products' => $this->products,
            'productCategories' => $this->productCategories,
            'reviews' => $this->reviews,
            'projects' => $this->projects,
            'partners' => $this->partners,
            'locations' => $this->locations,
        ]);
    }
}
