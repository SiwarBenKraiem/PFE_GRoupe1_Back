<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    //
    public function storeQuestionnaire(Request $request)
    {
        $data = $request->all();
        $questionnaire= Questionnaire::create([
            'sujet' => $data['sujet'],
            'title' => $data['title'],
            //'user-id' => $data['user-id'],
            //'formation-id'=> $data['formation-id']


        ]);
        $questionnaire->save();
    }
    public function update(Request $req, $id)
    {
        $questionnaire= Questionnaire::findOrFail($id);
        $questionnaire->update($req->all());

    }
    public function ListerQuestionnaire()
    {
        return Questionnaire::all();
    }
    public function SearchQST($query)
    {
        $qst=Questionnaire::where('title','like',"%$query%")->get();
        return $qst;
    }
    public function deleteQ($nom)
    {
        Questionnaire::where('title', $nom)->delete();

    }
}
