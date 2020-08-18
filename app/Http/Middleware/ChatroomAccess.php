<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use App\Models\Chat\ChatRoomUser;

use Closure;

class ChatroomAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    

         //ログインユーザーIDを取得
         $loginId = Auth::id();
         $roomid = $request->route()->parameters();
         $AccessUser = ChatRoomUser::where('chat_room_id', $roomid)
         ->where('user_id', $loginId)
         ->where('usertype', 'Company')            
         ->pluck('user_id');

         if( $AccessUser->first() == null){
            return redirect()->action(
                'Company\HomeController@index'
            );            
            }else{
                return $next($request);
            }
    }
}
