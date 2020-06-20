<?php


namespace App\Http\Controllers;


use App\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    //

    public function Ajout(Request $request)
    {
        $all = $request->all();
        $grp = new Groupe();

        $grp->nom = $all['nom'];
        $grp->description = $all['description'];
        $grp->save();
    }
    public function  find($id)
    {
        return Groupe::find($id);
    }

    public function liste()
    {
        return Groupe::all();
    }
    Public function chercherG( $nomD)
    {
        $grp=new Groupe();
        $grp= Groupe::where('nom','like',$nomD)->pluck('id');



        return ($grp);

    }
    public function search($query)
    {
        $grp= groupe::where('nom','like',"%$query%")
            ->orWhere('description','like',"%$query%")

            ->get();

        //return View
        return $grp;
    }
    public function suppG($code)
    {

        Groupe::where('nom', $code)->delete();
        return 240;

    }
    public function groupe($id)
    {
        return Groupe::findOrFail($id);

    }
    public function affectation( Request $request)
    {    $all = $request->all();
    $id1=$all['id1'];
    $id2=$all['id2'];
        $grp1= Groupe::findOrFail($id1);
        $grp2= Groupe::findOrFail($id2);
        if($grp1->id_P_P!=null)
        {
            return "impossible de mettre un groupe dans un sous sous groupe";

        }
        else
        {
            $grp2->update(['id_grp_p_p' => $grp1->id_grp_p,'id_grp_p' => $grp1->id]);

        return $grp1->id_grp_p; }

    }
    public function listesousgrp($id){

           $grps= Groupe::where('id_grp_p','=',"$id")->get();
       // array_push($grps,Groupe::where('id_grp_p_p','=',"$id")->get());
        return $grps;
    }

}
