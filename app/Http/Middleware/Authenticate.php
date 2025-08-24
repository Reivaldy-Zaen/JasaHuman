<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        // Tambahkan pesan flash
        session()->flash('error', 'Silakan login dulu untuk mengakses halaman ini.');
        return route('login');
    }
}

}
