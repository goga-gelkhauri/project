<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Follow;
use App\Models\Job;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function timeline()
    {
        $follows = Follow::where('from',Auth::user()->id)->get();
        //dd(count($follows));
        $id_s = array();
        foreach($follows as $follow)
        {
            $id_s[] = $follow->to;
        }
        $jobs =  Job::where(function ($q) use ($id_s) {
            $q->whereIn('user_id', $id_s);
        })->get();
        
        return view('user.timeline',compact('jobs'));
    }
}
