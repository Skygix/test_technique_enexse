<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersContacts extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_contacts';

    protected $fillable = ["phonePrefix","phoneNumber","landlinePrefix","landlineNumber","user_id"];


    /**
    * Get the user that owns the contact.
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
