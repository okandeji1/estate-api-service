<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
