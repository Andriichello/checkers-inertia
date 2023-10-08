<?php

namespace App\Enums;

use App\Enums\Traits\ListsValues;

/**
 * Class GameState.
 */
enum GameState: string
{
    use ListsValues;

    case NEW = 'NEW';
    case PENDING = 'PENDING';
    case PLAYING = 'PLAYING';

    case DRAW = 'DRAW';

    case LOSS = 'LOSS';
    case VICTORY = 'VICTORY';
}
