<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function packageCategory()
    {
        return $this->belongsTo(PackageCategory::class, 'package_category_id');
    }

    public function subscription()
    {
        return $this->hasOne(Subscriptions::class);
    }

    public function subscriptionLogs()
    {
        return $this->hasMany(SubscriptionLog::class);
    }
}
