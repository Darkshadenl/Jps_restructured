<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        $offers =  Offer::all()->take(3);

        dd($offers);

        return view('pages/home', [
            "offers" => $offers,
        ]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'max:50', 'min:2'],
            'email' => ['email'],
            'message' => ['min:10', 'max:255']
        ]);

        session()->flash('success', 'Uw bericht is verstuurd! Wij proberen zo snel mogelijk contact op te nemen.');
        Mail::to($request->email)->send(new ContactMail($request->full_name, $request->email, $request->message));
        return redirect()->route('home');
    }

}
