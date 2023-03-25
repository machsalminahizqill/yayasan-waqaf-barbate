<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;

class berandaController extends Controller
{
    public function page()
    {
        $beritas = berita::all()->take(3);;
        return view('guest.pages.beranda')
        ->with('beritas', $beritas);
    }
}
