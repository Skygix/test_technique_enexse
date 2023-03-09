<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsersRoles extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_roles';

    protected $fillable = ["user_id","role_id"];

      /**
    * Get the user that owns the role.
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

      /**
    * Get the role owns by the user.
    */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
