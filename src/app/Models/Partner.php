<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Partner
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string|null $logo_path
 * @property int $order
 * @property int $verification_status
 * @property string|null $verification_comment
 * @property int $active
 * @property int $exponent_id
 * @property string|null $published_at
 * @property-read \App\Models\Exponent $exponent
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereExponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereVerificationComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereVerificationStatus($value)
 */
class Partner extends Model
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
}
