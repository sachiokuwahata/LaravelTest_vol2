<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    //

    // ここから追加
    protected $fillable = ['chat_room_id', 'user_id', 'message'];    


    public function chatRoom()
    {
        return $this->belongsTo('App\Models\Chat\ChatRoom', 'id', 'chat_room_id');
    }


    public function user(){

        return $this->belongsTo('App\User', 'id' , 'user_id');
    }
}
