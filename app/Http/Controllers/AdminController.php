<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view ('admin.dashboard');
    } 

}
