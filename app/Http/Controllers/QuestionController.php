<?php

namespace App\Http\Controllers;


use App\Option;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function store(Questionnaire $questionnaire){
        $data=request()->validate([
            'txt_question' => 'required',
            'descriptif_reponse' => 'required',
            'is_true' => 'required',
            'txt'=> 'required',
            'questionnaire_id' => 'required',
        ]); 
        $question = $questionnaire->question()->create([

            'txt_question' =>  $data['txt_question'],
            'descriptif_reponse' => $data['descriptif_reponse'],
            'questionnaire_id' => $data['questionnaire_id']
        ]);
        $question->Options()->createMany([
            'txt'=> $data['txt'],
            'is_true' => $data['is_true']
        ]);

    }
    public function storeQuestion(Request $request)

    {

        $data = $request->all();
        $question = Question::create([
            //'sujet_id' => $data['sujet_id'],
            'txt_question' => $data['txt_question'],
            'descriptif_reponse' => $data['descriptif_reponse'],
            'questionnaire_id' => $data['questionnaire_id']
        ]);

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'txt') !== false && $value != '') {
                $status = $request->input('is_true') == $key ? 1 : 0;
                Option::create([
                    'question_id' => $question->id,
                    'txt'      => $value,
                    'is_true'     => $status
                ]);
            }
            $question->save();
        }
        //$optioncontent =[];


       /* $question = Question::create($request->all());
        for($q=1;$q<=4;$q++){
            $option=$request->input('txt_option' .$q, '');
            if($option != ''){
                Option::create([
                    'question_id' => $question->id,
                    'txt_option'   => $option,
                    //'is_true' => $option
                ]);
            }

        }
        $question->save();*/

       // $option=new Option();

       // $optioncontent=$option->txt_option=$request['txt-option'];



      // $question=$questionnaire->Questionnaire()->create($data['txt-question']);

       //$question->Options()->createMany($optioncontent);
        //$question->save();

       // $question = $question->txt_question=$request['txt-question'];
       // $question =  $question->txt_question=$request['descriptif_reponse'];
       // $question2 =  $question->txt_question=$request['sujet_id'];

       /*$option=request()->validate([
            'txt_option' => 'required|string',
            'is_true' => 'required'
        ]);*/
       // $option->txt_option=$request['txt-option'];
       //$option->is_true=$request['is_true'];


       // $option = $request->input('txt_option');
       // $option1 = $request->get('is_true');

        //$save = Question::create(array($request));

        //$save->Options()->createMany($option['txt_option']);





        }

        public function listqst()
        {
            return Question::all();
        }





}
