<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBookmark extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name','company_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
