<?php

namespace App\Http\Resources\Sector;

use App\Models\Sector;
use Illuminate\Http\Resources\Json\JsonResource;

class SectorNoRelationsResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Sector|self $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
