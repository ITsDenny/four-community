<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Level extends Model
{
    use HasFactory;

    protected $guarded = 'id';
    protected $table = 'level';
}
