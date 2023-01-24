<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['body','user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    //Using  envets of model to count answers in each questions 
    public static function boot()
    {
        parent::boot();
        
        static::created(function($answer){
            $answer->question->increment('answers_count');
        });

        static::deleted(function($answer){
            $question = $answer->question;
            $question->decrement('answers_count');
            if($question->best_answer_id === $answer->id){
                $question->best_answer_id = null;
                $question->save();
            }
        });
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }

    public function isBest()
    {
        return $this->id === $this->question->best_answer_id;
    }
    
    public function votes()
    {
        return $this->morphToMany(User::class,'votable');
    }
}
