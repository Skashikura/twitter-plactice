<?php
namespace App\http\Controllers;

use Illuminate\Http\apache_child_terminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Tweets;

class TweetController extends controller
{
  public function home(Request $request){
    $Tweets = Tweets::all();
    return view('home',['tweets'=>$Tweets]);
  }

  public function post(Request $request){
    $Tweets = new Tweets;
    $Tweets->user_id = Auth::user()->id;
    $Tweets->tweet = $request -> tweet;
    $Tweets->save();
    return redirect('home');
  }
}
