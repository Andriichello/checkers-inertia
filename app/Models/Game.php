<?php

namespace App\Models;

use App\Enums\GameState;
use Database\Factories\GameFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Game.
 *
 * @property int $id
 * @property int|null $user_one_id
 * @property int|null $user_two_id
 * @property string $state
 * @property string|null $moves
 * @property object|null $metadata
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User|null $userOne
 * @property User|null $userTwo
 *
 * @method static GameFactory factory($count = null, $state = [])
 */
class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_one_id',
        'user_two_id',
        'state',
        'moves',
        'metadata',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'metadata' => 'object',
    ];

    /**
     * User one of the game (moves first).
     *
     * @return BelongsTo
     */
    public function userOne(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_one_id',
            'id'
        );
    }

    /**
     * User two of the game (moves second).
     *
     * @return BelongsTo
     */
    public function userTwo(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_two_id',
            'id'
        );
    }
}
