<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "tagline",
        "description",
        "logo",
        "featured_photo",
        "address",
        "email",
        "phone",
        "website",
        "facebook",
        "twitter",
        "linkedin",
        "instagram",
        "sponsor_category_id",
        "map",
    ];
  
    public function sponsor_category(){
        return $this->belongsTo(SponsorCategory::class);
    }
}
