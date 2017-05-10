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

    public function getUsersThatAnswered($listingId)
    {
        return $this
                ->select('answers.*', 'users.email', 'users.name','users.id')
                ->join('answers', 'questions.id', '=', 'answers.questions_id')
                ->join('users', 'answers.user_id', '=', 'users.id')
                ->where('questions.listings_id', $listingId)
                ->groupBy('answers.user_id')
                ->get();
    }
}
