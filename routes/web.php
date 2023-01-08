<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\FavoritesController;
use App\Models\Question;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        
        $questions = Question::with('user')->latest()->paginate(5);

        return view('questions.index',compact('questions'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/questions', QuestionController::class)->except('show');
//Route::post('/question/{question}/answers',[AnswersController::class,'store'])->name('answers.store');
Route::resource('questions.answers', AnswersController::class)->except(['index','create','show']);
Route::get('/questions/{slug}', [QuestionController::class,'show'])->name('questions.show');
Route::post('answers/{answer}/accept/',AcceptAnswerController::class)->name('answers.accept');

Route::post('/questions/{question}/favorites',[FavoritesController::class,'store'])->name('questions.favorite');
Route::delete('/questions/{question}/favorites',[FavoritesController::class,'destroy'])->name('questions.unfavorite');