<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Bookmark;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = job::where('user_id',Auth::user()->id)->get();
        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show',compact('job'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'skills' => Skill::all(),
            'categories' => Category::all()
        ];
        return view('jobs.create',compact('data'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $request->validate([
            'title' => 'required',
            'schedule' => 'required',
            'logo' => 'required',
            'description' => 'required',
            'added_on' => 'required',
            'end_on' => 'required',
            'user_id' => 'required',
        ]);

        if ($files = $request->file('logo'))
        {
            $destinationPath = 'uploads/'; // upload path
            $image1 = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $image1);

           $job = Job::create([
                'title' => $request['title'],
                'schedule' => $request['schedule'],
                'logo' => $image1,
                'description' => $request['description'],
                'added_on' => $request['added_on'],
                'end_on' => $request['end_on'],
                'user_id' => Auth::user()->id
            ]);
        }
        
       
        foreach($request['skills'] as $skill)
        {
            $job->skills()->attach($skill);
        }

        foreach($request['categories'] as $category)
        {
            $job->categories()->attach($category);
        }
        
        return redirect()->route('jobs.index')
            ->with('success', 'Job created successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        if($job->user_id == Auth::user()->id)
        {
            $job->delete();
        }
        return redirect()->route('jobs.index');
    }

   
   

    
}
