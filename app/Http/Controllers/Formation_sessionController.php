<?php

namespace App\Http\Controllers;

use App\formation_session;
use Illuminate\Http\Request;

class Formation_sessionController extends Controller
{
    //
    public function affectation(Request $request)
    {
        $all = $request->all();
        $a= new Formation_session();

        $a->formation_id = $all['idf'];
        $a->session_id = $all['ids'];

        $a->save();

    }
}
