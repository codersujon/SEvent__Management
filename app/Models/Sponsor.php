<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;
    
    public function sponsor_category(){
        return $this->belongsTo(SponsorCategory::class);
    }
}
