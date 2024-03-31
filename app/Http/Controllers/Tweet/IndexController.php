<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Factory $factory, TweetService $tweetService)
    {
        //
        // return 'Single Action!';
        // return view('tweet.index', ['name' => 'laravel']);
        // return View::make('tweet.index', ['name' => 'laravel']);
        // return $factory->make('tweet.index', ['name' => 'laravel']);

        // return view('tweet.index')
        //     ->with('name', 'laravel')
        //     ->with('version', '8');

        // $tweets = Tweet::all();
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();

        // $tweetService = new TweetService();
        $tweets = $tweetService->getTweets();
        // dump($tweets);
        // app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));
        return view('tweet.index')
            ->with('tweets', $tweets);
        // dd($tweets);
    }
}
