<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'interest',
        'profile_attributes_id'
    ];
    use HasFactory;

    public function profile_attributes()
    {
        return $this->belongsTo(ProfileAttributes::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
