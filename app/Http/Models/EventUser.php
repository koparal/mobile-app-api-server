<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    protected $table = "event_user";
    public $timestamps = false;

    protected $fillable = [
        "id",
        "event_id",
        "user_id"
    ];
}
