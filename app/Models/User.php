<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserRole;
use App\Enums\RoleNameEnum;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Hash password
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }

    /**
     * Get the user's role.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles(): HasMany
    {
        return $this->hasMany(UserRole::class, 'user_id');
    }

    // Check if user is an admin
    public function isAdmin()
    {
        $user_roles = $this->roles()->get();

        foreach ($user_roles as $user_role) {
            return $user_role->role_id === RoleNameEnum::ADMIN->value;
        }
        return false;
    }

    // Check if user is a worker
    public function isWorker()
    {
        $user_roles = $this->roles()->get();

        foreach ($user_roles as $user_role) {
            return $user_role->role_id === RoleNameEnum::WORKER->value;
        }
        return false;
    }
}
