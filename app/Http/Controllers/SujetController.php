<?php

namespace App\Http\Controllers;

use App\sujet;
use Illuminate\Http\Request;

class SujetController extends Controller
{
    //
    public function AjouterSujet(Request $request)
    {

        $all = $request->all();
        $sujet = new sujet();
        $sujet->sujet = $all['sujet'];
        $sujet->save();
    }
    public function ListerSujet()
    {
        return sujet::all();
    }

}
