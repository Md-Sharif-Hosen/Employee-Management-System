<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function getsessiondata(request $request)
    {
        //function_body
        if ($request->session()->has('key')) {
    return $request->session()->get('key');            # code...
        } else {
            # code...
            return 'session has no valyue';
        }

    }

    public function storesessiondata(request $request)
    {
        //function_body
        $request->session()->put('key','web jurney');
        return 'value successfully added';
    }

    public function destorysessiondata(request $request)
    {
        //function_body
        $request->session()->forget('key');
        return 'session value destroy successfully';
    }
}
