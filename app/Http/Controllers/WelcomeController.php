<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WelcomeController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest:web');        
    }    

    //
    public function index()
    {

        // $auths = Auth::user();
        // dd($auths);

        return view('welcome');
    }
}
