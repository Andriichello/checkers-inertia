<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Get the `Home` view.
     *
     * @return Response
     */
    public function view(): Response
    {
        return Inertia::render('Home');
    }
}
