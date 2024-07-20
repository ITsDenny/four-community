<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    public function getAssetUrlAttribute($value)
    {
        if ($value == null) return null;
        return env('APP_URL') . "/storage/$value";
    }
}
