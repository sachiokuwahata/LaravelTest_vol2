<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{


    //
    public function chatRoomUsers()
    {
        return $this->hasMany('App\Models\Chat\ChatRoomUser', 'id', 'chat_room_id' );
        // return $this->hasMany('App\Models\Chat\ChatRoomUser', 'chat_room_id', 'id' );
    }

    public function chatRoomMessages()
    {
        return $this->hasMany('App\Models\Chat\ChatMessage', 'id' , 'chat_room_id');
        // return $this->hasMany('App\Models\Chat\ChatMessage', 'chat_room_id', 'id' );
    }


}
