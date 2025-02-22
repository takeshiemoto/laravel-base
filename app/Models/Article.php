<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\Organization|null $organization
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article withoutTrashed()
 * @mixin \Eloquent
 */
class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'organization_id',
    ];

    /**
     * 記事の投稿者を取得
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 記事が所属する組織を取得
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
