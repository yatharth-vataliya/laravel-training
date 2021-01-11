<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Queue\ShouldQueue;

class Student extends Model implements ShouldQueue
{
    use HasFactory,softDeletes;

    protected $guarded = [];

    public function getStudentProfilePictureAttribute($value)
    {
        return asset("storage/profile_pictures/{$value}");
    }

}
