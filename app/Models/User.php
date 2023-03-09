<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['userId','username','fullname', 'gender_id','email','emailPec','dateOfBirth','active'];
     
    /**
    * Get the gender of the user.
    */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    /**
    * Get the adresses for the user.
    */
    public function adresses(): HasMany
    {
        return $this->hasMany(UsersAdresses::class);
    }

    /**
    * Get the contacts for the user.
    */
    public function contacts(): HasMany
    {
        return $this->hasMany(UsersContacts::class);
    }

    /**
    * Get the roles for the user.
    */
    public function roles(): HasMany
    {
        return $this->hasMany(UsersRoles::class);
    }

    //Delete the relationships before the user is deleted

    public function delete() {
        $this->adresses()->delete();
        $this->contacts()->delete();
        $this->roles()->delete();
        parent::delete();
    }
}
