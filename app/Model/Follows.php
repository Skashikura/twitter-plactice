<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
  protected $table = 'follows';
  protected $guarded = array('id');
}
