<?php
namespace App\http\Controllers;

use Illuminate\Http\apache_child_terminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Tweets;

class TweetController extends controller
{
  public function home(Request $request){
    // $Tweets = Tweets::select('tweets.*','users.name')
    //   ->join('users','tweets.user_id','=','users.id')
    //   ->orderby('created_at','desc')
    //   ->get();
    $Tweets = Tweets::orderby('created_at','desc')
      ->get();


      $test = Tweets::find(1);
      dd($test->userdata->name);

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
