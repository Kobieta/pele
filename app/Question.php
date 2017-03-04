<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'asking', 'photo', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'questions_id', 'id');
    }

    public function getAnswers($user, $id) {
//        DB::table('questions')
//            ->select('answers.*', 'users.email', 'users.name','users.id')
//            ->leftJoin('answers', 'questions.id', '=', 'answers.questions_id')
//            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
//            ->where('questions.listings_id', $id)
//            ->where('answers.user_id', $user)
//            ->get();

        return $this->select('answers.*')
            ->leftJoin('answers', 'questions.id', '=', 'answers.questions_id')
            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
            ->where('questions.listings_id', $id)
            ->where('answers.user_id', $user)
            ->get();
    }
}
