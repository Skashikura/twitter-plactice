<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
  protected $table = 'follows';
  protected $guarded = array('id');

  public function tweets()
  {
    return $this->hasMany('App\Model\Tweets','user_id','follow_id');
  }
}
