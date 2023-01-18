<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function switchLanguage($lang){
        Session::put('locale', $lang);

        App::setLocale($lang);
        session()->put('locale', $lang); 
        return redirect()->back();
    }
}
