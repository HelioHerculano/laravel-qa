<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    
    public function update(User $user, Answer $answer)
    {
       return $user->id === $answer->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Answer $answer)
    {
        return $user->id === $answer->user_id;
    }

    public function accept(User $user, Answer $answer)
    {
        return $user->id === $answer->question->user_id;
    }

    
}
