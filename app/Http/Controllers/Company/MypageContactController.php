<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Chat\ChatRoomUser;
use App\Models\User;
use App\Models\Company;


class MypageContactController extends Controller
{
    //    
    public function messageList()
    {
        $loginId = Auth::id();

        $chat_room_id = ChatRoomUser::where('user_id', $loginId)
        ->where('usertype', 'Company')
        ->pluck('chat_room_id');

        $messageUser = ChatRoomUser::whereIn('chat_room_id', $chat_room_id)
        ->where('usertype', 'Interviewer')
        ->get();
        
        // $messageUser = ChatRoomUser::whereIn('chat_room_id', $chat_room_id)
        // ->where('usertype', 'Interviewer')
        // ->pluck('user_id');
        // $messageUserInfo = User::whereIn();        
        // dd($messageUser);

        // foreach($messageUser as $user){
        //     dd($user->InterviewUser->email);
        // }

        return view('company.messageList', compact('messageUser'));
    }


    public function profile()
    {
        $loginId = Auth::id();

        $profileInfo = Company::find($loginId);

        return view('company.profile', compact('profileInfo'));
    }

    public function profileEdit()
    {
        $loginId = Auth::id();
        $profileInfo = Company::find($loginId);

        return view('company.profileEdit', compact('profileInfo'));
    }

    
    public function profileUpdate(Request $request)
    {

        $loginId = Auth::id();
        $profileInfo = Company::find($loginId);

        $profileInfo->name = $request->name;
        $profileInfo->email = $request->email;
        $profileInfo->save();

        return redirect()->action(
            'Company\mypageContactController@profile'
        );

    }



}
