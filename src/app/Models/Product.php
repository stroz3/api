<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $brand
 * @property string|null $video_path
 * @property string $desc
 * @property string|null $price
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string|null $min_batch
 * @property string|null $payment_method
 * @property string|null $delivery_method
 * @property int $in_bulk
 * @property int $retail
 * @property int $is_import_substitution
 * @property int $active
 * @property int $is_service
 * @property int $exponent_id
 * @property int|null $product_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeliveryMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInBulk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsImportSubstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMinBatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoPath($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Exponent $exponent
 * @property-read \App\Models\ProductCategory|null $productCategory
 * @property string|null $verification_comment
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVerificationComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVerificationStatus($value)
 * @property int $verification_status
 * @property string|null $published_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePublishedAt($value)
 */
class Product extends Model
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

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
