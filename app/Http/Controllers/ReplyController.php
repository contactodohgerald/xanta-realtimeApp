<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function getAllReply(Question $question){

        return ReplyResource::collection($question->replies);
    }

    public function getSingleReply(Question $question, Reply $reply){
        return new ReplyResource($reply);
    }

    public function storeReply(Question $question, Request $request){

         $reply = $question->replies()->create($request->all());

         return response(['data' => $reply], Response::HTTP_CREATED);
    }

    public function deleteReply(Question $question, Reply $reply){

        try {
            $reply->delete();
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return "an error occurred";
        }


    }
}
