<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function supervisionReport(Request $request)
    {
        Mail::to('developerv2000@gmail.com')->send(new SupervisionReport($request));

        return redirect($request->header('referer'));
    }
}
