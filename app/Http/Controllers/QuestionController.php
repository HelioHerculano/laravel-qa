<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\AskQuestionRequest;
use Illuminate\Http\Request;
use App\Models\User;

class QuestionController extends Controller
{

   // public function __construct(){
      //  $this->middleware('auth',['except' => ['index','show']]);
   // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(4);

        if(!$questions):
            return response()->json([
                'success' => false,
                'message' => "Not found"
            ], 200);
        else:
            return response()->json([
                'message' => "Todas as Secções",
                'dados' => $questions
            ], 200);
        endif; 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQuestionRequest $request, $email)
    {
        $user = User::class::where('email','=',$email);
        
        $req = $user->questions()->create($request->only("title","body"));

        /*$response = [
            'success' => true,
            'data' => $req,
        ];*/

       // if($req){
            return response()->json($req,200);
        //}
        //return redirect()->route('questions.index')->with("success","Your question has been submitted");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

      $question->increment('views');

      return view('questions.show',compact('question'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        /*if(\Gate::denies('update-question',$question)){
            abort(403,"Access denied");
        }*/
        $this->authorize('update',$question);

        return view('questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(AskQuestionRequest $request, Question $question)
    {
        /*if(\Gate::denies('delete-question',$question)){
            abort(403,"Access denied");
        }*/
        $this->authorize('update',$question);

        $question->update($request->only('title','body'));
        return redirect('/questions')->with('success','Your question has been upedated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
       /* if(\Gate::denies('delete-question',$question)){
            abort(403,"Access denied");
        }*/

        $this->authorize('delete',$question);

        $question->delete();
        return redirect('/questions')->with('success','Your question has been deleted.');
    }
}
