<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Listing;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
    $peles = Listing:: where('user_id', Auth::getUser()->id)->get();


    return view('account.show', compact('peles'));
    }

    public function users($id)
    {
        $data = DB::table('questions')
            ->select('answers.*', 'users.email', 'users.name','users.id')
            ->leftJoin('answers', 'questions.id', '=', 'answers.questions_id')
            ->leftJoin('users', 'answers.user_id', '=', 'users.id')
            ->where('questions.listings_id', $id)
            ->groupBy('answers.user_id')
            ->get();

        return view('account.users', compact('data', 'id'));


    }

    public function reply($user, $listingId)
    {
        $question = new Question();
        $data = $question->getQuestionsAndAnswersPerUser($user, $listingId);
        return view('account.reply', compact('data'));
    }
}
