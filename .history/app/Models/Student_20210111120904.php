<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
class Student extends Model implements CanResetPassword
{
    use HasFactory,softDeletes,Notifiable;

    protected $guarded = [];

    public function getStudentProfilePictureAttribute($value)
    {
        return asset("storage/profile_pictures/{$value}");
    }

    public function sendPasswordResetNotification($token)
{
    $url = 'https://example.com/reset-password?token='.$token;

    $this->notify(new ResetPasswordNotification($url));
}

}
