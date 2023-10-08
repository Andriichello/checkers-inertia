<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
    /**
     * Get the `Login` view.
     *
     * @return Response
     */
    public function view(): Response
    {
        return Inertia::render('Login');
    }

    /**
     * Login and start session.
     *
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = Arr::only(
            $request->validated(),
            [
                'email',
                'password',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return Redirect::route('home.view');
        }

        return back()
            ->withErrors(['password' => 'Invalid credentials.'])
            ->onlyInput('email');
    }
}
