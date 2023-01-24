<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;

class voteAnswerController extends Controller
{
     public function __construct()
     {
        $this->middleware('auth');
     }

     public function __invoke(Answer $answer)
     {
        $user =  User::find(auth()->id());
        
        $vote = (int) request()->vote;

        $user->voteAnswer($answer,$vote);

        return back();
     }
}
