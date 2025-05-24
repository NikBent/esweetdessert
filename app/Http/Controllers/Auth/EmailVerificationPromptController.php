<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended('/dashboard')
            : view('auth.verify-email');
    }
}
