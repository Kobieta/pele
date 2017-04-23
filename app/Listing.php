<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Listing extends Model
{
    protected $fillable = [
        'name', 'styling', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function getUsersWhoAnswered($id)
    {
        return
            DB::table('questions')
            ->select('answers.*', 'users.email', 'users.name','users.id')
            ->leftJoin('answers', 'questions.id', '=', 'answers.questions_id')
            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
            ->where('questions.listings_id', $id)
            ->groupBy('answers.user_id')
            ->get();
    }
}

