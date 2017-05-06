<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswersRequest;
use App\Http\Requests\SendListing;
use App\Listing;
use App\Mail\AnswersNotificationMail;
use App\Mail\ListingFromFriendMail;
use App\Mail\NewAccount;
use App\Question;
use App\User;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ListingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Answer;



class ListingsController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth');

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
        //Check session.
        if(Auth::check()) {

            $userID = Auth::getUser()->id;

        } else { // user is not logged in

            // Save user's credentials
            $email = $request['email'];
            $user = new User();
            $user->name = explode('@', $email)[0];
            $user->email = $email;


            $user->avatar = $user->generateRandomAvatar();

            // password generator
            $password = $user->generateRandomPassword();
            $user->password = bcrypt($password);
            $user->save();

            // Start session
            Auth::login($user);

            // Send information email
            Mail::to($user->email)->send(new NewAccount($user, $password));

            $userID = $user->id;
        }

        $listing = new \App\Listing();
        $listing->user_id = $userID;
        $listing->name = $request->input('name');
        $listing->styling = $request->input('styling');
        $listing->slug = str_slug($request->input('name'));
        $listing->save();

        foreach ($request->input('asking') as $item) {
            $question = new Question();
            $question->asking = $item;
            $question->photo = 'test';
            $question->user_id = $userID;
            $question->listings_id = $listing->id;
            $question->save();
        }

        return view('listings.step2', compact('listing'));
    }

    public function show($slug, $id)
    {
        $listings = Listing::where('slug', $slug)->where('id', $id)
            ->first();
        $questions = Question::where('listings_id', $id)->get();

        return view('listings.show', compact('listings', 'questions'));
    }

    public function store(AnswersRequest $request)
    {
        $listing = Listing::find($request['listing_id']);
        if(Auth::check()) {


            $user = Auth::user();
            $userID = $user->id;

            if($user->id != $listing->user_id) {

                $question = new Question();
                $users = $question->getUsersThatAnswered($listing->id);

                $answered = false;
                if(count($users)) {
                    foreach($users as $single_user) {
                        if($single_user->id == $user->id) {
                            $answered = true;
                        }
                    }
                }

                if($answered) {
                    return redirect()->to('/account')->with('message', 'Już odpowiedziałeś na tę listę.');
                }

            } else {
                return redirect()->to('/account')->with('message', 'Nie możesz odpowiadać na własną listę pytań.');
            }

        } else {
            // Save user's credentials
            $email = $request['email'];
            $user = new User();
            $user->name = explode('@', $email)[0];
            $user->email = $email;

            // password generator
            $password = $user->generateRandomPassword();
            $user->password = bcrypt($password);
            $user->save();
            $user->avatar = $user->generateRandomAvatar();
            // Start session
            Auth::login($user);

            // Send information email
            Mail::to($user->email)->send(new NewAccount($user, $password));

            $userID = $user->id;
        }


        foreach ($request->input('reply') as $key => $item) {
            $reply = new Answer();
            $reply->reply = $item;
            $reply->user_id = $userID;
            $reply->questions_id = $key;
            $reply->save();
        }

        Mail::send(new AnswersNotificationMail($listing->user_id, Auth::user()));

        return redirect()->to('/account')->with('message', 'Odpowiedziałeś znajomemu na pytania.')->withInput();
    }


    /**
     * @param SendListing $request
     * @return response
     */
    public function sendListingToFriend(Request $request)
    {
        $user = Auth::user();

        $friend_email = $request['email'];
        $list_link = $request['list_link'];

        if(Session::token() == $request['_token']) {

            if($friend_email != $user->email) {

                Mail::send(new ListingFromFriendMail($user, $list_link, $friend_email));
                return response()->json([
                    'status' => 'success',
                    'code' => 1,
                    'msg' => 'Wysłano!',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'code' => 0,
                    'msg' => 'Nie możesz wysłać emaila do siebie.',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'code' => 0,
                'msg' => 'Nieautoryzowany dostęp.',
            ]);
        }
    }
}
