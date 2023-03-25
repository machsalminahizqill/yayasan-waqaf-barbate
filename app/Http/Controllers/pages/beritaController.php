<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;

class beritaController extends Controller
{
    public function page()
    {
        $beritas =  berita::Paginate(15);

        return view('guest.pages.berita.main')
        ->with('beritas', $beritas);
    }

    public function detailPage($slug, $id)
    {
        $berita = berita::where('id', $id)->where('slug', $slug)->first();
        $beritas = berita::where('id', '!=', $id)->get();

        if (count($beritas) > 4) {
            $beritas = berita::where('id', '!=', $id)->get()->random(4);
        }

        return view('guest.pages.berita.detail')
        ->with('berita', $berita)
        ->with('beritas', $beritas);
    }
}
