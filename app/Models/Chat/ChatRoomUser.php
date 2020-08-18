<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Model;

class ChatRoomUser extends Model
{

    protected $fillable = ['chat_room_id', 'user_id', 'usertype'];    


    public function chatRoom()
    {
        return $this->belongsTo('App\Models\Chat\ChatRoom', 'chat_room_id' , 'id');
        // return $this->belongsTo('App\Models\Chat\ChatRoom', 'id', 'chat_room_id');
    }

    public function InterviewUser()
    {
        return $this->belongsTo('App\Models\User' , 'user_id' ,'id');
        // return $this->belongsTo('App\Models\User','id' , 'user_id');
    }

    public function CompanyUser()
    {
        return $this->belongsTo('App\Models\Company', 'user_id','id' );
        // return $this->belongsTo('App\Models\Company','id' , 'user_id');
    }
}
