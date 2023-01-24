<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OverOnsController extends Controller
{
    public function index()
    {
        return view('pages.about-us');
    }

    public function privacy()
    {
        if (Storage::disk('local')->exists("public/PrivacyPolicy/Privacy_Statement.pdf")) {
            $path = Storage::disk('local')->path("public/PrivacyPolicy/Privacy_Statement.pdf");
            return response()->file($path);
        }
        
        abort(404);
    }
}
