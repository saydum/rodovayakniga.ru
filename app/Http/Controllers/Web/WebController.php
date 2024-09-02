<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index()
    {
        return view('Web.index');
    }
}
