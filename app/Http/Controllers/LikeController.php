<?php

namespace App\Http\Controllers;

use App\Model\Reply;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function likeIt(Reply $reply){
        $reply->like()->create([
           // 'user_id' => auth()->id()
            'user_id' => '1'
        ]);
    }

    public function unLikeIt(Reply $reply){

        try {
            //$reply->like()->where(['user_id' => auth()->id()])->first()->delete();
            $reply->like()->where('user_id', '1')->first()->delete();
            return response(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            return "server error";
        }
    }
}
