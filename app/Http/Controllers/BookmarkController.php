<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Bookmark;
use App\Models\CompanyBookmark;
use App\Models\Job;
use App\Models\User;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bookmarks()
    {
        $user = Auth::user();
        return view('user.bookmarks')->with('user',$user);
    }

    public function addBookmark($id)
    {
        $job = Job::find($id);
        $bookmark_exists = Bookmark::where('name',$job->title)->get();
        $user = Auth::user();

        if(count($bookmark_exists) > 0)
        {
           
            return redirect()->back()->with('bookmark','goga');
        }

        $bookmark = Bookmark::create(['name' => $job->title,'user_id'=>Auth::user()->id]);
        return view('user.bookmarks')->with('user',$user);
       
    }

    public function deleteBookmark($id)
    {
        $bookmark = Bookmark::find($id);
        if(Auth::user()->id == $bookmark->user_id)
        {
            $bookmark->delete();
        }
        return redirect()->back();
    }


    public function addCompanyBookmark($id)
    {
        $company = User::find($id);
        $bookmark_exists = CompanyBookmark::where('name',$company->name)->get();
        $user = Auth::user();

        if(count($bookmark_exists) > 0)
        {
           
            return redirect()->back()->with('bookmark','goga');
        }

        $bookmark = CompanyBookmark::create(['name' => $company->name,'company_id' => $company->id,'user_id'=>Auth::user()->id]);
        return redirect()->back();
       
    }

    public function deleteCompanyBookmark($id)
    {
        $bookmark = CompanyBookmark::find($id);
        if(Auth::user()->id == $bookmark->user_id)
        {
            $bookmark->delete();
        }
        return redirect()->back();
    }
}
