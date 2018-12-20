<?php

namespace App\Http\Controllers;

use Illuminate\Http\apache_child_terminate;
use Illuminate\Http\Request;
use App\Model\Userdata;

class MenuController extends Controller
{

  public function __construct() {
    $this->middleware('auth');//ログインしてない状態でアクセスできなくする、ログイン画面を強制表示
  }

  public function test() {
    $menu = 'menu';
    return view('menu',['menu'=>$menu]);
  }

  // public function output(Request $request){
  //   $Users = Userdata::all();
  //   return view('menu',['items'=>$Users]);
  // }

}
