<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

public function index()
{
    return view('public', ['title' => 'CrowPlays']);
}



/*
public function __construct()
{
 $this->middleware('auth');
} */
    
}



?>