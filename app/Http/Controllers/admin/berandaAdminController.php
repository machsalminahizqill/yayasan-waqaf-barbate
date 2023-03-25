<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class berandaAdminController extends Controller
{
    public function mainPage()
    {
        return view('admin.pages.dashboard');
    }

}
