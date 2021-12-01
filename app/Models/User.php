<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paiement()
    {
        return $this->hasMany(Paiement::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, "user_role", "user_id", "role_id");
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, "user_permission", "user_id", "permission_id");
    }
    public function hasRole($role)
    {
        return $this->roles()->where("nom", $role)->first() !== null;
    }

    public function hasAnyRoles($roles)
    {
        return $this->roles()->where("nom", $roles)->first() !== null;
    }
    public function getAllRoleNamesAttribute()
    {
        return $this->roles->implode("nom", '|');
    }
}
