<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function getUrlAttribute(){
        
        //return route('questions.show',$this->id);
        return "#";
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getAvatarAttribute()
    {
        $email = $this->email;
        $size = 32;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
    }

    public function favorites()
    {
        return $this->belongsToMany(Question::class,'favorites')->withTimestamps();//,'user_id','question_id');
    }

    public function voteQuestions()
    {
        return $this->morphedByMany(Question::class,'votable');
    }

    public function voteAnswers()
    {
        return $this->morphedByMany(Answer::class,'votable');
    }

    public function voteQuestion(Question $question, $vote)
    {
        $voteQuestions = $this->voteQuestions();

        if( $voteQuestions->where('votable_id',$question->id)->exists() ){
            $voteQuestions->updateExistingPivot($question,['vote'=>$vote]);  
        }
        else{
            $voteQuestions->attach($question,['vote' => $vote]);
        }

        $question->load('votes');//refresh votes relationship
        $downVotes = (int) $question->downVotes()->sum('vote');//counting number of down votes for any questions
        $upVotes = (int) $question->upVotes()->sum('vote');//counting number of up votes for any questions
        $question->votes_count = $downVotes + $upVotes;
        $question->save();
    }
}
