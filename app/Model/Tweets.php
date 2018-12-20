<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tweets extends Model
{
    protected $table = 'tweets';//tableを指定
    protected $guarded = array('id'); //値自動割り当て
    //public $timestamps = false; //updated_at,created_atの無効化(あるものとして考えてくれているから)

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
