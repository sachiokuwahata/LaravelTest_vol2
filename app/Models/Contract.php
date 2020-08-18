<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    // ここから追加
    protected $fillable = ['from_user_id', 'to_user_id', 'usertype', 'status'];        
}
