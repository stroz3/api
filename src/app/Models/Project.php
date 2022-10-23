<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $name
 * @property string|null $website_link
 * @property string|null $content
 * @property string|null $video_path
 * @property int $is_video
 * @property int $is_import_substitution
 * @property int $verification_status
 * @property string|null $verification_comment
 * @property int $active
 * @property string|null $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsImportSubstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereVerificationComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereVerificationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereVideoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereWebsiteLink($value)
 * @mixin \Eloquent
 * @property int $exponent_id
 * @property-read \App\Models\Exponent $exponent
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereExponentId($value)
 */
class Project extends Model
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
