<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersAdresses extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'users_addresses';

    protected $fillable = ["country","state","addressLine","zipCode","user_id"];

    /**
    * Get the user that owns the address.
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }  
}
