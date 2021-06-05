<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('index');
    }

    // public function pns()
    // {
    //     return view('pns');
    // }

    // public function tkk()
    // {
    //     return view('tkk');
    // }
}
