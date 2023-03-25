<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kontakController extends Controller
{
    public function page()
    {
        return view('guest.pages.kontak');
    }
}
