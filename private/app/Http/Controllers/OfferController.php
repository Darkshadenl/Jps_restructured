<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class OfferController extends Controller
{
    use WithPagination;

    public function index() {
        return view('pages.offer');
    }

    public function getBrochure($id) {
        $offer = Offer::find($id);

        if (!empty($offer)) {
            if (Storage::disk('local')->exists("public/brochures/{$offer->brochure}")) {
                $path = Storage::disk('local')->path("public/brochures/{$offer->brochure}");
                return response()->file($path);
            }
        }
        abort(404);
    }
}
