<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->role === 'warga') {
                return redirect()->route('beranda');
            }
        }

        return redirect('/login');
    }
}
