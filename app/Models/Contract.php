<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    //
    // ここから追加
    protected $fillable = ['from_user_id', 'to_user_id', 'usertype', 'status'];        


    public function company(){
        return $this->belongsTo('App\Models\Company', 'from_user_id', 'id' );
    }    

    public function user(){
        return $this->belongsTo('App\Models\User', 'to_user_id', 'id' );
    }    
}
