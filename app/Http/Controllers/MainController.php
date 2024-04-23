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

        return view('index');
    }
}
