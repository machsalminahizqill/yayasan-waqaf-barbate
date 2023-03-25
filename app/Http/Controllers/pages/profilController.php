<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profilController extends Controller
{
    public function visiMisiPage()
    {
        return view('guest.pages.profil.visiMisi');
    }
}
