<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory,softDeletes,Notifiable;

    protected $guarded = [];

    public function getStudentProfilePictureAttribute($value)
    {
        return asset("storage/profile_pictures/{$value}");
    }

}
