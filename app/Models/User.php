<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\MustVerifyEmail as MustVerifyTrait;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\GoogleResetPassword;
// use Illuminate\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, MustVerifyTrait;

    public function sendPasswordResetNotification($token)
    {
        if ($this->google_id) {
            // Google user → custom reset mail
            $this->notify(new GoogleResetPassword($token));
        } else {
            // Normal user → Laravel default reset email
            $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'google_id',
        'name',
        'img',
        'email',
        'password',
        'description',
        'x_twitter',
        'facebook',
        'instagram',
        'linkedin',
        // 'email_verified_at',
    ];

    public function blogs()
    {
        return $this->hasMany(Blogs::class);
    }

    public function categories()
    {
        return $this->hasMany(Categories::class);
    }

    public function tags()
    {
        return $this->hasMany(Tags::class);
    }

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
        ];
    }
}
