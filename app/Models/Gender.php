<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory;

    /**
     * Get the users for the gender.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
