<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    use HasFactory;
    protected $table = 'user_event';
    public $timestamps = false;

    protected $fillable = ['user_id', 'event_id'];
}
