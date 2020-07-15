<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contenu;
use App\Type;

class ContenuController extends Controller
{
    //
    public function Ajout(Request $request)
    {$all=$request->all();	    

        $all=$request->all();
       	       
         $model=$all['nom_module'];
         $length=$all['length'];
           
        for($i=0;$i<$length;$i++){
            $c=new Contenu();
            $type=Type::findOrFail($all['id_type'.$i]);
            if($type->nom_type == 'texte'){
                $c->contenu=$all['contenu'.$i];
            
            }
            else{
                $file=$request->file('contenu'.$i);
                $filename=time().'.'.$file->getClientOriginalExtension();
                $destinationPath = 'storage';
                $file->move($destinationPath,$file->getClientOriginalName());
                $c->contenu=$filename;
            }


            $c->nom_contenu= $all['nom_contenu'.$i];
            $c->id_type = $all['id_type'.$i];
            $c->id_module=$model;
            $c->save();
        }	        
        

return  $all;	       
}
   public function consultercontenu(Request $req)
   {


   }



}
    
