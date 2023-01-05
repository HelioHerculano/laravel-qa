<?php

namespace App\Providers;

use App\Models\Question;
use App\Policies\QuestionPolicy;
use App\Models\Answer;
use App\Policies\AnswerPolicy;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('update-question',function($user,$question){
            return $user->id === $question->user_id;
        });
        \Gate::define('delete-question',function($user,$question){
            return $user->id === $question->user_id && $question->answers_count < 1;;
        });
    }
}
