<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email'); // default Breeze view
    }
}
