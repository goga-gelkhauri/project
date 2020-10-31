<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','logo','schedule','added_on','end_on','description','user_id'];

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','job_category','job_id','category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
