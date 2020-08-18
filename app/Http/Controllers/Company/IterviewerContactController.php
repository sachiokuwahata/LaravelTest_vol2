<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class IterviewerContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function interviewerShow($id)
    {

        $userInfo = User::find($id, ['id', 'name', 'email']);
        return view('company.interviewer', compact('userInfo'));
    }


}
