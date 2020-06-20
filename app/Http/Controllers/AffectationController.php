<?php


namespace App\Http\Controllers;


use App\Affectation;
use App\Groupe;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function affectation(Request $request)
    {
        $all = $request->all();
        $a= new Affectation();

        $idU = $all['idU'];
        $idG = $all['idG'];
        $grp=Groupe::find($idG);
        $a->idU=$idU;
        $a->idG=$idG;
        $a->id_grp_p=$grp->id_grp_p;
        $a->id_grp_p_p=$grp->id_grp_p_p;
        $a->save();
    }
    public function number($id)
    {
       $list= Affectation::where('idU','=',"$id")->
            orwhere('id_grp_p','=',"$id")->
            orwhere('id_grp_p_p','=',"$id")->get();
       return sizeof($list);
    }

}
