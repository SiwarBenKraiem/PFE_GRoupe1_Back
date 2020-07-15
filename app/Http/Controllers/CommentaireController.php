<?php

namespace App\Http\Controllers;
use App\Module;
use App\User;
use App\commentaire_module_users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;



use Illuminate\Http\Request;

class CommentaireController extends Controller
{ 
    //auth()->id()  $module->id  request('commentaire')
    public function commenter(Request $req){
        commentaire_module_users::create([
            'user_id' => Auth::id(),
            'module_id' => $req['module_id'],
            'commentaire' => $req['commentaire'],
        ]);
        return back();

    }
}
