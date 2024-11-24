<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\FuncCall;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'slug',
        'email',
        'password',
        'role_id',
        'biodata_id',
        'instansi_id'
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
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function verifikator()
    {
        return $this->hasOne(VerifikasiWbtb::class);
    }

    public function penetap()
    {
        return $this->hasOne(PenetapanWbtb::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
