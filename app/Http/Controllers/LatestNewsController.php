<?php

namespace App\Http\Controllers;

class LatestNewsController extends Controller
{
    public function index()
    {
        return view('pages.latest-news');
    }
}
