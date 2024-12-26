<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    function indexPage() {
        $mobil = Mobil::take(4)->get();

        return view('pages.mobil.index', [
            "title" => "Mobil",
            "mobil" => $mobil,
        ]);
    }
}
