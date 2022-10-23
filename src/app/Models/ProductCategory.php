<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductCategory
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property int $active
 * @property int $exponent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereExponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Exponent $exponent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property string|null $verification_comment
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereVerificationComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereVerificationStatus($value)
 * @property int $verification_status
 * @property string|null $published_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory wherePublishedAt($value)
 */
class ProductCategory extends Model
{
    use HasFactory;

    protected $casts = [
        'active' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function exponent()
    {
        return $this->belongsTo(Exponent::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
