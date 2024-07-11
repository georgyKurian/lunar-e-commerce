<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Location extends Model
{
    use HasFactory;

    public function enrolmentSettings(): BelongsToMany
    {
        return $this->belongsToMany(EnrolmentSetting::class);
    }
}
