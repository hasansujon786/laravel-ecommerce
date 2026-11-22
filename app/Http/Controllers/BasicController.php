<?php

namespace App\Http\Controllers;

class BasicController extends Controller
{
    protected $name;

    public function __construct() {
        $this->name = "kuddus";
    }

    public function index()
    {
        return view('welcome');
    }

    public function aboutUs()
    {
        return "about us {$this->name}";
        /* return view('about_us'); */
    }
}
