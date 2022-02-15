<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function propertyCategory()
    {
        return $this->belongsTo(PropertyCategory::class, 'property_category_id');
    }

    public function propertyFeatures()
    {
        return $this->hasMany(PropertyFeature::class);
    }
}
