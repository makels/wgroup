<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    /**
     * Administrator - management users, posts, messages... etc.
     */
    const ADMIN = 1;

    /**
     * Moderator - management posts, messages
     */
    const MODERATOR = 2;

    /**
     * Member - create posts, send messages
     */
    const WRITER = 0;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'sex',
        'birthday',
        'country',
        'city',
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

    public function hasRole($role): bool {
        return $this->role == $role;
    }

    public function inRoles(array $roles): bool {
        return in_array($this->role, $roles);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public static function getRoleName(int $role) {
        switch ($role) {
            case self::WRITER:
                return __("Writer");
            case self::ADMIN:
                return __("Administrator");
            case self::MODERATOR:
                return __("Moderator");
            default:
                return __("Guest");
        }
    }
}
