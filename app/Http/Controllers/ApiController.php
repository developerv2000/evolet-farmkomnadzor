<?php

namespace App\Http\Controllers;

use App\Mail\SupervisionReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class ApiController extends Controller
{
    public function getView(Request $request)
    {
        $availableLanguages = ['en', 'ru'];
        $lang = $request->lang;

        if ($lang && in_array($lang, $availableLanguages)) {
            app()->setLocale($lang);
        }

        $appLocale = app()->getLocale();
        $redirectUrl = $request->redirect_url;

        return view('index', compact('appLocale', 'redirectUrl'))->render();
    }

    public function supervisionReport(Request $request)
    {
        Mail::to('developerv2000@gmail.com')->send(new SupervisionReport($request));
        // Mail::to('drugsafety@evolet.co.uk')->send(new SupervisionReport($request));

        return redirect($request->redirect_url ?: $request->headers->get('referer'));
    }
}
