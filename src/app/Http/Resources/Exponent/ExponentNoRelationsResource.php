<?php

namespace App\Http\Resources\Exponent;

use App\Http\Resources\Sector\SectorNoRelationsResource;
use App\Http\Resources\User\UserResource;
use App\Models\Exponent;
use App\Services\FileManager;
use Illuminate\Http\Resources\Json\JsonResource;

class ExponentNoRelationsResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Exponent|self $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'short_desc' => $this->short_desc,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'full_desc' => $this->full_desc,
            'logo_path' => FileManager::getImageUrl($this->logo_path),
            'main_img_path' => FileManager::getImageUrl($this->main_img_path),
            'website_link' => $this->website_link,
            'contacts' => $this->contacts,
            'inn' => $this->inn,
            'kpp' => $this->kpp,
            'ogrn' => $this->ogrn,
            'business_address' => $this->business_address,
            'production_address' => $this->production_address,
            'is_import_substitution' => $this->is_import_substitution,
            'active' => $this->active,
            'sector_id' => $this->sector_id,
            'user_id' => $this->user_id,
            'user' => UserResource::make($this->user),
            'sector' => SectorNoRelationsResource::make($this->sector),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
