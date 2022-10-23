<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property string $text
 * @property int|null $eval
 * @property string $author_name
 * @property string $author_company
 * @property string|null $img_path
 * @property int $exponent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exponent $exponent
 * @method static \Database\Factories\ReviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereAuthorCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereEval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereExponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereImgPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $verification_comment
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereVerificationComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereVerificationStatus($value)
 * @property int $verification_status
 * @property string|null $published_at
 * @method static \Illuminate\Database\Eloquent\Builder|Review wherePublishedAt($value)
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'eval',
        'author_name',
        'author_company',
        'img_path',
        'exponent_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function exponent()
    {
        return $this->belongsTo(Exponent::class);
    }
}
