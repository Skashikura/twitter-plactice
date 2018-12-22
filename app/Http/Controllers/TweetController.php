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
  public function __construct() {
    $this->middleware('auth');//ログインしてない状態でアクセスできなくする、ログイン画面を強制表示
  }

  public function home(Request $request)
  {
    // $Tweets = Tweets::select('tweets.*','users.name')
    //   ->join('users','tweets.user_id','=','users.id')
    //   ->orderby('created_at','desc')
    //   ->get();
    // $Tweets = Tweets::orderby('created_at','desc')
    //   ->get();

    $my_user = Follows::where('user_id', Auth::id())->get();
    $follow_id_list = [];

    foreach ($my_user as $follow)
    {
      $follow_id_list[] = $follow->follow_id;
    }
    //dd($follow_id_list);
      // $test = Tweets::find(1);
      // dd($test->user->name);
    $Tweets = Tweets::whereIn('user_id',$follow_id_list)
      ->get();

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
    // UserテーブルのidカラムとユーザーIDが一致しないものをget（取得）
    // ログイン中ユーザーだけgetしないようにするためのもの

    $my_user = User::find(Auth::id());
    //userテーブルの中にあるAuth::idをfind
    $follow_id_list = [];
    // 配列宣言
    foreach ($my_user->follows as $follow) {
    // my_user(Userテーブル)のfollowsテーブルの情報を配列として認識させる
      $follow_id_list[] = $follow->follow_id;
      // 配列として認識させたfollowの中のfollow_idカラムの分だけforeach、全て配列変数化
    }
    //dd( Auth::user() );
    return view('user.list',['users'=>$Users , 'follow_id_list'=>$follow_id_list]);
    // この時点でfollow_id_listはログイン中のユーザーで
    // follow_id（ログインユーザーがフォローしているユーザー）
    // に登録されてる物を配列として代入している状態
    // そこに登録されているidをフォロー中（フォロー済み）にするようにviewでif文として定義
    // これによりフォローしているかしていないかを判別できるようになる
  }

  public function fpost(Request $request)
  {
    $Follows = new Follows;
    // 新しくテーブルにデータを作る
    $Follows->user_id = Auth::user()->id;
    // ログイン中のユーザーのidを取得、followsテーブルのuser_idカラムに登録
    $Follows->follow_id = $request -> followId;
    // viewから送られてきたフォローするユーザーのidを取得、followsテーブルのfollow_idに登録
    $Follows->save();
    // セーブ
    return redirect('users');
  }

  public function unfollow(Request $request)
  {
    $unfollow = Follows::where('user_id' , [Auth::id()])
                      ->where('follow_id',$request->unfollowId);
    $unfollow->delete();
    return redirect('users');
  }
}
