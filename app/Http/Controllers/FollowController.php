<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\User;
use Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        $follower = Auth::user()->id;
        $company = User::where('id',$id)->first();

        if($company === null)
        {
            return redirect()->back();
        }
        else
        {
            if($company->user_type == 'company'){
                if($id != null){
                    Follow::create(['from' => $follower,'to' => $id]);
                }
                return redirect()->back();
            }
            return redirect()->back();
        }
        
    }

    public function unfollow($id)
    {
        $company = Follow::where('from',Auth::user()->id)->where('to',$id);
        $company->delete();
        return redirect()->back();
    }
}
