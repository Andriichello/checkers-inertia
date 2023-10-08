<?php

namespace App\Http\Controllers\Web\Game;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class GameController.
 */
class GameController extends Controller
{
    /**
     * Get the `Game` view.
     *
     * @param int|null $id
     *
     * @return Response
     */
    public function view(mixed $id = null): Response
    {
        return Inertia::render('Game', ['id' => $id]);
    }
}
