<?php

namespace App\Http\Controllers;

use App\Formation_module;
use Illuminate\Http\Request;

class Formation_Module_controller extends Controller
{
    //
    public function affectation(Request $request)
    {
        $all = $request->all();
        $a= new Formation_module();

        $a->id_module = $all['1'];
        $a->id_formation = $all['0'];
        $a->duree=$all['2'];
        $a->save();

    }
    public function listeAffectation()
    {
     return   Formation_module::all();
    }
}
