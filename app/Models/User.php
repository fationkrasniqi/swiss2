<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'is_admin',
        'can_view_clients',
        'can_view_messages',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'can_view_clients' => 'boolean',
            'can_view_messages' => 'boolean',
        ];
    }

    public function isSuperAdmin(): bool
    {
        return $this->email === 'info@janiracare.ch';
    }

    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }

    public function canViewClients(): bool
    {
        return $this->is_admin || $this->can_view_clients;
    }

    public function canViewMessages(): bool
    {
        return $this->is_admin || $this->can_view_messages;
    }
}
