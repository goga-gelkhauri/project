<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class CompanyController extends Controller
{
    /**
     * followed companies
     */
    public function index()
    {
        $companies = User::where('user_type','company')->get();
        $user = Auth::user();
        return view('company.index',compact('companies','user'));
    }

    public function showCompany($id)
    {
        $company = User::where('user_type','company')->where('id',$id)->first();
        $user = Auth::user();
        return view('company.company',compact('company','user'));
    }
}
