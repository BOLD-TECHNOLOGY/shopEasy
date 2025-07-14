<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use App\Enums\Roles;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => Roles::class,
        ];
    }

    public function getDashboardRoute(): string
    {
        return match($this->role) {
            Roles::Admin => route('admin.dashboard'),
            Roles::User => route('dashboard'),
            Roles::Blogger => route('blogger.dashboard'),
            Roles::Vendor => route('vendor.dashboard'),
            Roles::Customer => route('customer.dashboard'),

            default => route('login'),
        };
    }

    /**
     * Get all shops owned by this user
     */
    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }

    /**
     * Get active shops owned by this user
     */
    public function activeShops(): HasMany
    {
        return $this->shops()->where('is_active', true);
    }


    public function isRole(Roles $role): bool
    {
        return $this->role === $role->value;
    }

    
     /**
     * Get the user's initials.
     *
     * @return string|null
     */
    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        foreach ($names as $name) {
            $initials .= strtoupper(substr($name, 0, 1));
        }
        return $initials;
    }
}
