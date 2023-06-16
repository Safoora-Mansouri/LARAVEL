<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class localizationController extends Controller
{
    public function index($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
