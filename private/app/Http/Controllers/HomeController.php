<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Rules\ReCaptchaRule;

class HomeController extends Controller
{

    public function index()
    {
        $offers =  Offer::all()->take(3);

        return view('pages/home', [
            "offers" => $offers,
        ]);
    }

    public function contact(Request $request)
    {
        $request->validate([
            'full_name' => ['required', 'max:50', 'min:2'],
            'email' => ['email'],
            'message' => ['min:10', 'max:255'],
            'g-recaptcha-response' => ['required', new ReCaptchaRule]
        ]);

        session()->flash('success', 'Uw bericht is verstuurd! Wij proberen zo snel mogelijk contact op te nemen.');
        Mail::to("info@jpsretail.nl")->send(
            new ContactMail($request->full_name, $request->email, $request->message));
        return redirect()->route('home');
    }

}
