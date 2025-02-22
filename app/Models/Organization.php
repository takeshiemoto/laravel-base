<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Article> $articles
 * @property-read int|null $articles_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Organization withoutTrashed()
 * @mixin \Eloquent
 */
class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * 組織に所属するユーザーを取得
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * 組織の記事を取得
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    /**
     * 組織の管理者を取得
     */
    public function admin()
    {
        return $this->users()->where('role', 'admin')->first();
    }
}
