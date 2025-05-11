<?php

namespace App\Http\Controllers\backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{

    public function index()
    {
        return view('backend.partials.content');
    }
}
