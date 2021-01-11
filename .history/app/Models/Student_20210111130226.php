<?php

namespace App\Models;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,softDeletes;

    protected $guarded = [];

    public function getStudentProfilePictureAttribute($value)
    {
        return asset("storage/profile_pictures/{$value}");
    }

}
