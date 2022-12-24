<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function cat()
    {
     return $this->belongsTo('App\Models\Cat');
    }
    public function courses()
    {
     return $this->hasMany('App\Models\Course');
    }
}
