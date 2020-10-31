<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;
use App\Models\Skill;

class HomeController extends Controller
{
    public function home()
    {
        $jobs = Job::all();
        $categories = Category::all();
        $skills = Skill::all();
        return view('home', compact('jobs','skills','categories'));
    }

    public function show($id)
    {
        $job = Job::find($id)->first();
        return view('job',compact('job'));
    }

    public function search(Request $request)
    {
        $skills = $request['skills'];
        $categories = $request['categories'];

        if($skills != null){
            $jobs =  Job::whereHas('skills', function ($q) use ($skills) {
                $q->whereIn('name', $skills);
            });
        }

        if($categories != null){
            if(!isset($jobs))
            {
                $jobs =  Job::whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('name', $categories);
                });
            }else{
                $jobs =  $jobs->whereHas('categories', function ($q) use ($categories) {
                    $q->whereIn('name', $categories);
                });
            }
            
        }

        if($request['name'] != null)
        {
            if(!isset($jobs))
            {
                $jobs = Job::where('title',$request['name']);
            }else{
                $jobs = $jobs->where('title',$request['name']);
            }
        }

        $jobs = $jobs->get();
        return view('search',compact('jobs'));
    }
}
