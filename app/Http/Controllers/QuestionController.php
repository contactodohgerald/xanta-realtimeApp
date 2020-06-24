<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Model\Question;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    //
    private $errorCode = 0;
    private $status = true;

    public function getAllQuestion(){

        $data = QuestionResource::collection($request = Question::latest()->get());

        return [
            'status' => $this->status,
            'errorCode' => $this->errorCode,
            'returnedData' => [$data]
        ];

    }

    public function getSingleQuestion(Question $question){
        $data = new QuestionResource($question);

        return [
            'status' => $this->status,
            'errorCode' => $this->errorCode,
            'returnedData' => [$data]
        ];
    }

    public function storeQuestion(Request $request){
        //auth()->user()->question()->create($request->all());
        Question::create($request->all());
        return response('CREATED', Response::HTTP_ACCEPTED);
    }

    public function deleteSingleQuestion(Question $question){

        try {
             $question->delete();
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return 'An error occurred!';
        }
    }
}
