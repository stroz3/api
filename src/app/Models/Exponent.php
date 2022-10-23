<?php

namespace App\Models;

use App\Services\FileManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exponent
 *
 * @property int $id
 * @property string $name
 * @property string $short_desc
 * @property string|null $meta_title
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 * @property string $full_desc
 * @property string $logo_path
 * @property string $main_img_path
 * @property string $website_link
 * @property mixed|null $contacts
 * @property string $inn
 * @property string|null $kpp
 * @property string|null $ogrn
 * @property string|null $business_address
 * @property string|null $production_address
 * @property int $is_import_substitution
 * @property int $is_public
 * @property int $sector_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Exponent newModelQuery()
 * @method static Builder|Exponent newQuery()
 * @method static Builder|Exponent query()
 * @method static Builder|Exponent whereBusinessAddress($value)
 * @method static Builder|Exponent whereContacts($value)
 * @method static Builder|Exponent whereCreatedAt($value)
 * @method static Builder|Exponent whereFullDesc($value)
 * @method static Builder|Exponent whereId($value)
 * @method static Builder|Exponent whereInn($value)
 * @method static Builder|Exponent whereIsImportSubstitution($value)
 * @method static Builder|Exponent whereIsPublic($value)
 * @method static Builder|Exponent whereKpp($value)
 * @method static Builder|Exponent whereLogoPath($value)
 * @method static Builder|Exponent whereMainImgPath($value)
 * @method static Builder|Exponent whereMetaDescription($value)
 * @method static Builder|Exponent whereMetaKeywords($value)
 * @method static Builder|Exponent whereMetaTitle($value)
 * @method static Builder|Exponent whereName($value)
 * @method static Builder|Exponent whereOgrn($value)
 * @method static Builder|Exponent whereProductionAddress($value)
 * @method static Builder|Exponent whereSectorId($value)
 * @method static Builder|Exponent whereShortDesc($value)
 * @method static Builder|Exponent whereUpdatedAt($value)
 * @method static Builder|Exponent whereUserId($value)
 * @method static Builder|Exponent whereWebsiteLink($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Sector $sector
 * @property-read \App\Models\User $user
 * @property string $slug
 * @property bool $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProductCategory[] $productCategories
 * @property-read int|null $product_categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\ExponentFactory factory(...$parameters)
 * @method static Builder|Exponent whereActive($value)
 * @method static Builder|Exponent whereSlug($value)
 * @property string|null $verification_comment
 * @method static Builder|Exponent whereVerificationComment($value)
 * @method static Builder|Exponent whereVerificationStatus($value)
 * @property int $verification_status
 * @property string|null $published_at
 * @method static Builder|Exponent wherePublishedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Location[] $locations
 * @property-read int|null $locations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Partner[] $partners
 * @property-read int|null $partners_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @property-read int|null $projects_count
 * @method static Builder|Exponent byUserFullName()
 */
class Exponent extends Model
{
    use HasFactory;

    protected $with = ['user', 'sector'];

    protected $fillable = [
        'name',
        'slug',
        'short_desc',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'full_desc',
        'logo_path',
        'main_img_path',
        'website_link',
        'contacts',
        'inn',
        'kpp',
        'ogrn',
        'business_address',
        'production_address',
        'is_import_substitution',
        'active',
        'sector_id',
        'user_id',
        'verification_status',
        'verification_comment',
    ];

    protected $casts = [
        'contacts' => 'collection',
        'active' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function partners()
    {
        return $this->hasMany(Partner::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function scopeByUserFullName(Builder $query, string $search)
    {
        $query->whereRelation('user', 'name', 'LIKE', "%{$search}%")
            ->orWhereRelation('user', 'surname', 'LIKE', "%{$search}%")
            ->orWhereRelation('user', 'patronymic', 'LIKE', "%{$search}%");
    }
}
