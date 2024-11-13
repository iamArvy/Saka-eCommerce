<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
abstract class Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function user()
    {
        return Auth::user();
    }

    //
    public function render($component, $props = [])
    {
        return Inertia::render($component, $props);
    }
}
