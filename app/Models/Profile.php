<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'user_id',
        'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile_attribute()
    {
        return $this->hasMany(ProfileAttribute::class);
    }
}
