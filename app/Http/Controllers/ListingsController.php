<?php

namespace App\Http\Controllers;

use App\Listing;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ListingRequest;
use Illuminate\Support\Facades\Auth;
use App\Answer;

class ListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index');
    }

    public function step1()
    {

        $questions = config('question');
        return view('listings.step1', compact('questions'));


    }

    public function step2(ListingRequest $request)
    {
        echo $request->input('name');
        $listing = new \App\Listing();
        $listing->user_id = Auth::getUser()->id;
        $listing->name = $request->input('name');
        $listing->styling = $request->input('styling');
        $listing->slug = str_slug($request->input('name'));
        $listing->save();

        foreach ($request->input('asking') as $item) {
            $question = new Question();
            $question->asking = $item;
            $question->photo = 'test';
            $question->user_id = Auth::getUser()->id;
            $question->listings_id = $listing->id;
            $question->save();

        }

        //dd($request->all());
        return view('listings.step2', compact('listing'));
    }

    public function show($slug, $id)
    {
        $listings = Listing::where('slug', $slug)->where('id', $id)
            ->first();
//        dd($Listings->name);
        $questions = Question::where('listings_id', $id)->get();

        return view('listings.show', compact('listings', 'questions'));

    }

    public function store(Request $request)
    {
//        dd($request->all());
//        Answer::create($request->all());

        $email = $request->input('email');

        $user = new User();
        $user -> name = explode('@', $email)[0];
        $user -> email = $email;
        $user -> password = bcrypt('user1');
        $user -> save();
        $email = $request->input('email');

        foreach ($request->input('reply') as $key => $item) {
            $reply = new Answer();
            $reply->reply = $item;
//            $reply->photo = 'test';
            $reply->user_id = $user->id;
            $reply->questions_id = $key;
            $user->id;
            $reply->save();

        }
       // return redirect()->route('listings.store');

    }

}