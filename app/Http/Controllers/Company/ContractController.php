<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat\ChatRoomUser;

class ContractController extends Controller
{
    //


    public function presentation(Request $request)
    {
        $request->validate([
            'interviewCount' => 'required',
            'money' => 'required',
        ]);

        Contract::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->toUserID,            
            'usertype' => "Company",
            'status'=> "presentation"
        ]);

        $chat_room = ChatRoomUser::where('user_id', Auth::id())
        ->pluck('chat_room_id');

        $chat_room_id = ChatRoomUser::whereIn('chat_room_id', $chat_room)
        ->where('user_id', $request->toUserID)
        ->pluck('chat_room_id');    

        return redirect()->action(
            'Company\ChatController@show', ['roomid' => $chat_room_id->first()]
        );
    }    


    public function show(Request $request)
    {
        dd($request->user_id);

        return view('company.contract.show');
    }    

}
