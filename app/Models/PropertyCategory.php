<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
