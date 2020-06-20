<?php

namespace App\Http\Controllers;

use App\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    //
    public function Ajout(Request $request)
    {
        $all = $request->all();
        $Domaine = new Domaine();

        $Domaine->nom_domaine = $all['nom'];
        $Domaine->save();
    }

    public function liste()
    {
        return Domaine::all();
    }
    Public function chercherD( $nomD)
    {
        $domaine=new Domaine();
        $domaine= Domaine::where('nom_domaine','like',$nomD)->pluck('id');



        return ($domaine);

    }
    public function suppD($code)
    {

        Domaine::where('id', $code)->delete();
        return 240;

    }
    public function chercher( $id)
    {$domaine=new Domaine();
       $domaine= Domaine::find($id);

        return $domaine->nom_domaine;
    }
}
