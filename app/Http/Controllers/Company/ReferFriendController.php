<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Company;



class ReferFriendController extends Controller
{
    public function getaddress()
    {   
    $loginId = Auth::id();

    $hash = Company::where('id', $loginId)
    ->pluck('hash')
    ->first();


    $hashurl = 'http://127.0.0.1:8000/company/contactFriend/'.$hash;

    return view('company.getaddress', compact('hashurl'));

    }

    public function contactFriend($request){

        $friend = Company::where('hash', $request)
        ->get()
        ->first();

    
        // dd($friend);

        return view('company.contactFriend', compact('friend'));

    }

}
