<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NieuwsController extends Controller
{
    public function index(){

        return view('pages.nieuws');
    }
}
