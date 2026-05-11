<?php

namespace App\Http\Controllers;

class JudgmentController extends Controller
{
    public function index()
    {
        return view('pages.judgments');
    }

    public function show($id)
    {
        return view('pages.judgment-detail', compact('id'));
    }
}
