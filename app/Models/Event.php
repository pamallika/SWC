<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'creator_id',
        'title',
        'descr',
    ];

    public function creator() {
        return $this->hasOne(User::class);
    }

    public function subscribers() {
        return $this->belongsToMany(User::class);
    }

}
