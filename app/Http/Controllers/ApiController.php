<?php

namespace App\Http\Controllers;

use App\Mail\SupervisionReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    /**
     * Demo example for copy + paste
     *
     * Dont forget to copy public/forms folder into your own project
     *
     * Checkout resources/css/app.css for styles and resources/views/demo.blade.php for rendering
     */
    public function supervision()
    {
        $response = Http::get('http://farmkomnadzor.spey.tj/api/get-view?lang=' . app()->getLocale() . '&redirect_url=' . route('supervision.index'));
        $supervisionForm = $response->successful() ? $response->body() : null;

        return view('pages.supervision', compact('supervisionForm'));
    }
}
