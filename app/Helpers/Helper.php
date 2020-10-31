<?php
namespace App\Helpers;

use Auth;
use App\Models\Follow;

class Helper
{
    public static function Follows($company_id)
    {
        $company = Follow::where('from',Auth::user()->id)->where('to',$company_id)->get();
        return count($company);
    }
}
