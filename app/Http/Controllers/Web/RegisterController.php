<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    /**
     * Get the `Register` view.
     *
     * @return Response
     */
    public function view(): Response
    {
        return Inertia::render('Register');
    }

    /**
     * Register a new user.
     *
     * @param RegisterRequest $request
     *
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $attributes = Arr::only(
            $request->validated(),
            [
                'name',
                'email',
                'password',
            ]
        );

        User::query()->create($attributes);

        return Redirect::route('login.view', Arr::only($attributes, 'email'));
    }
}
