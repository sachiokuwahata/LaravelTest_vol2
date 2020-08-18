<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Chat\ChatMessage;
use App\Models\Chat\ChatRoomUser;
use App\Models\Chat\ChatRoom;

use App\Models\Contract;


class ChatController extends Controller
{
    //


    protected function firstMessage(Request $request)
    {

        // dd(Auth::id());
        // dd($request);
        // dd($request->freeans);
        // dd($request->userId);

        $matching_user_id = $request->userId;

        $current_user_chat_rooms = ChatRoomUser::where('user_id', Auth::id())
        ->pluck('chat_room_id');
        // dd($current_user_chat_rooms);

        $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $current_user_chat_rooms)
        ->where('user_id', $matching_user_id)
        ->where('usertype', 'Interviewer') // matching相手が、interviewer縛り       
        ->pluck('chat_room_id');    

        // dd($chat_room_id);

        if ($chat_room_id->isEmpty()){
            ChatRoom::create(); //チャットルーム作成
            $latest_chat_room = ChatRoom::orderBy('created_at', 'desc')->first(); //最新チャットルームを取得
            $chat_room_id = $latest_chat_room->id;

            ChatRoomUser::create(
                [
                'chat_room_id' => $chat_room_id,
                'user_id' => Auth::id(),
                'usertype' => "Company"
                ]                
            );

            ChatRoomUser::create(
                [
                'chat_room_id' => $chat_room_id,
                'user_id' => $matching_user_id,
                'usertype' => "Interviewer"
                ]                
            );
            $this->sendMessage($request , $chat_room_id);
        } else{
            $chat_room_id = $chat_room_id->first();
            $this->sendMessage($request , $chat_room_id);
        }

        return redirect()->action(
            'Company\ChatController@show', ['roomid' => $chat_room_id]
        );
    }
    

    protected function sendMessage($request, $chat_room_id)
    {
        return ChatMessage::create([
            'user_id' => $request->userId,
            'chat_room_id' => $chat_room_id,
            'message' => $request->freeans,
        ]);
    }

    protected function show($roomid)
    {
        $userID = Auth::id();

        $ChatRoomUser = ChatRoomUser::where('chat_room_id', $roomid)
        ->where('user_id', '!=', $userID)->orWhereNull('user_id')
        ->pluck('user_id')
        ->first();
        $contract = Contract::where('from_user_id', $userID)
        ->where('to_user_id', $ChatRoomUser)
        ->get();

        // dd($contract);

        $Messages = ChatMessage::where('chat_room_id', $roomid)->get();
        // dd($Messages);


        return view('chat.show', compact('Messages', 'userID', 'contract', 'ChatRoomUser'));

     }


}
