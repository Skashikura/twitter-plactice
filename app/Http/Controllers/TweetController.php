<?php
namespace App\http\Controllers;

use Illuminate\Http\apache_child_terminate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Tweets;
use App\User;
use App\Model\Follows;

class TweetController extends controller
{
  public function home(Request $request)
  {
    // $Tweets = Tweets::select('tweets.*','users.name')
    //   ->join('users','tweets.user_id','=','users.id')
    //   ->orderby('created_at','desc')
    //   ->get();
    $Tweets = Tweets::orderby('created_at','desc')
      ->get();


      // $test = Tweets::find(1);
      // dd($test->user->name);

    return view('home',['tweets'=>$Tweets]);
  }

  public function post(Request $request)
  {
    $Tweets = new Tweets;
    $Tweets->user_id = Auth::user()->id;
    $Tweets->tweet = $request -> tweet;
    $Tweets->save();
    return redirect('home');
  }

  public function list(Request $request)
  {
    $Users = User::whereNotIn('id' , [ Auth::id() ] )->get();
    $my_user = User::find(Auth::id());
    $follow_id_list = [];
    foreach ($my_user->follows as $follow) {
      $follow_id_list[] = $follow->follow_id;
    }
    //dd( Auth::user() );
    return view('user.list',['users'=>$Users , 'follow_id_list'=>$follow_id_list]);
  }

  public function fpost(Request $request)
  {
    $Follows = new Follows;
    $Follows->user_id = Auth::user()->id;
    $Follows->follow_id = $request -> followId;
    $Follows->save();
    return redirect('users');
  }
}
