<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $availableLanguages = ['en', 'ru'];
        $lang = $request->lang;

        if ($lang && in_array($lang, $availableLanguages)) {
            app()->setLocale($lang);
        }

        $appLocale = app()->getLocale();

        return view('index', compact('appLocale'));
    }

    public function report()
    {
        return to_route('index');
    }
}
