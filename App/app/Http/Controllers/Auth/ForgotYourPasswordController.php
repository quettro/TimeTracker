<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotYourPasswordRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class ForgotYourPasswordController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Auth.forgot-your-password');
    }

    /**
     * @param ForgotYourPasswordRequest $request
     * @return RedirectResponse
     */
    public function store(ForgotYourPasswordRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status != Password::RESET_LINK_SENT)
            return back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);

        return back()->with('status', __($status));
    }
}
