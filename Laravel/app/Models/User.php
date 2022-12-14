<?php

namespace App\Models;

use App\Models\Newsletter;
use App\Models\Wallet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'password',
        'phone',
        'last_active',
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

    public function newsletter()
    {
        return $this->hasOne( Newsletter::class );
    }

    public function wallet()
    {
        return $this->hasOne( Wallet::class );
    }

    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify( new VerifyEmail );
    // }

    // public function sendPasswordResetNotification( $token )
    // {
    //    $this->notify( new ResetPassword( $token ) );
    // }
}
