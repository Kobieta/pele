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

    public function getQuestionsAndAnswersPerUser($user, $id)
    {
        return $this
                ->select('questions.asking','answers.reply')
                ->leftJoin('answers', 'questions.id', '=', 'answers.questions_id')
                ->where('questions.listings_id', $id)
                ->where('answers.user_id', $user)
                ->get();
    }
}
