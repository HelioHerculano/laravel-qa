<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;

class VotablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('votables')->where('votable_type','App\Models\Question')->delete();

        $users = User::all();
        $numberOfUsers = $users->count();
        $votes = [-1,1];

        foreach (Question::all() as $question) {
            
            for ($i=0; $i < rand(1, $numberOfUsers); $i++) { 
                
                $user = $users[$i];
                $user->voteQuestion($question,$votes[rand(0,1)]);
                
            }

        }
    }
} 
