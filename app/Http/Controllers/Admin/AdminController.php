<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home()
    {
        return response()->view('admin.home');
    }
}
