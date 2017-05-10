<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Listing;
use App\Question;
use App\User;
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
        $user = Auth::user();

        return view('account.show', compact('user'));
    }


    public function listings(Request $request)
    {
        $peles = Listing::where('user_id', Auth::getUser()->id)->get();

        return view('account.listings', compact('peles'));
    }

    public function users($listingId)
    {
        /*
       $data = DB::table('questions')
            ->select('answers.*', 'users.email', 'users.name','users.id')
            ->join('answers', 'questions.id', '=', 'answers.questions_id')
            ->join('users', 'answers.user_id', '=', 'users.id')
            ->where('questions.listings_id', $listingId)
            ->groupBy('answers.user_id')
            ->get();
    */
        $question = new Question();

        $data = $question->getUsersThatAnswered($listingId);

        return view('account.users', compact('data', 'listingId'));
    }

    public function reply($user, $listingId)
    {
        $currentUser = Auth::user();
        $listing = Listing::find($listingId);

        $question = new Question();
        $data = $question->getQuestionsAndAnswersPerUser($user, $listingId);


        if($currentUser->id == $user || $currentUser->id == $listing->user_id) {
            return view('account.reply', compact('data', 'currentUser'));
        } else {
            return redirect()->to('/account')->with([
                'message' => 'Nie masz dostępu do tej listy.',
                'error' => 'error_message'
            ]);
        }
    }

    /**
     * Changes user's name
     *
     */
    public function changeUsername(Request $request)
    {
        $user = Auth::user();

        $new_name = $request['name'];

        $user->name = $new_name;
        $user->update();

        return redirect()->back()->with([
            'message' => 'Zmieniłeś swój nick!',
            'class' => 'succes_message'
        ]);
    }

}
