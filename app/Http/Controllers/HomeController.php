<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // if (auth()->user()->is_admin) {
        //     return redirect()->route('admin.home');
        // }
        return redirect()->route('store.home');
    }
}
