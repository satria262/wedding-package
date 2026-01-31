<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingPackageTestimonial extends Model
{
    protected $fillable = ['testimonial', 'wedding_package_id'];

    public function weddingPackage()
    {
        return $this->belongsTo(WeddingPackage::class);
    }
}
