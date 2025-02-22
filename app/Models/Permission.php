<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Permission query()
 * @mixin \Eloquent
 */
class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'can_create',
        'can_edit',
        'can_delete',
        'can_view',
    ];

    /**
     * 権限を持つユーザーを取得
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
