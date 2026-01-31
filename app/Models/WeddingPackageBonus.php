<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingPackageBonus extends Model
{
    protected $fillable = ['bonus_name', 'wedding_package_id'];

    public function weddingPackage()
    {
        return $this->belongsTo(WeddingPackage::class);
    }

}
