<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScheduleDay extends Model
{
    use HasFactory;

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
