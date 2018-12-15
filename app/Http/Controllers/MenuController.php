<?php

namespace App\Http\Controllers;

use Illuminate\Http\apache_child_terminate;

class MenuController extends Controller
{

  public function __construct() {
    $this->middleware('auth');//ログインしてない状態でアクセスできなくする、ログイン画面を強制表示
  }

  public function test() {
    $menu = 'menu';
    return view('menu',['menu'=>$menu]);
  }


}
