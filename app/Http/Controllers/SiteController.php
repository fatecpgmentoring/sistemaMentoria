<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;

class SiteController extends Controller
{
    function index(Request $request)
    {
        $mentores = Mentor::orderBy('vl_nota', 'desc')->limit(6)->get();
        return view('site.homepage.index', compact('mentores'));
    }
}
