<?php

namespace App\Http\Controllers;


use App\Option;

use Illuminate\Http\Request;

class OptionController extends Controller
{
    //

    
    public function ajoutoption(Request $request)
    {
        $all = $request->all();
        $option = new Option();
        //$option->question_id=$all['question_id'];
        $option->txt=$all['txt'];
        $option->is_true=$all['is_true'];

        $option->save();
    }


}
