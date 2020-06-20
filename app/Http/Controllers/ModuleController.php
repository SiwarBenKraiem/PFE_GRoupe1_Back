<?php

namespace App\Http\Controllers;

use App\Affectation;
use App\Formation_module;
use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function findIdModule($nom)
    {
        return $m = Module::where('nom_module', 'like', $nom)->pluck('id');
    }

    public function Ajout(Request $request)
    {
        $all = $request->all();
        $module = new Module();

        $module->nom_module = $all['nom_module'];


        $module->save();
        return $module->id;

    }

    public function ListeModule()
    {
        return Module::all();
    }
public function listenon()
{


}
    Public function chercherM($nomM)
    {

        return Module::where('nom_module', 'like', "%$nomM%")->get();

    }
}
