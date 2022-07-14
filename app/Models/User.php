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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'otp',
        'owner_id',
        'usercode',
        'status_id',
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


    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function subscription()
    {
        return $this->hasOne(UserSubscription::class, 'user_id')->latest();
    }

    final public function subscriptions(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(UserSubscription::class, 'user_id');
    }

    final public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany {
        return $this->hasMany(Transactions::class)->orderByDesc('id');
    }
    final public function transaction(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(Transactions::class)->latest();
    }

    final public function bank_account_detail(): \Illuminate\Database\Eloquent\Relations\HasOne {
        return $this->hasOne(AccountDetail::class);
    }

    public function hasAnyRoles($roles): bool
    {
        if (
            $this->roles()->whereIn('name', $roles)->first()
        ) {
            return true;
        }
        return false;
    }

    public function hasRole($role): bool
    {
        if (
            $this->roles()
            ->where('name', $role)
            ->first()
        ) {
            return true;
        }
        return false;
    }

    public function isActive($status): bool
    {
        if (
            $this->status()
            ->where('name', $status)
            ->first()
        ) {
            return true;
        }
        return false;
    }

    public function subscriptionStatus($status): bool
    {
        if (
            $this->subscription()->where('status', $status)->first()
        ) {
            return true;
        }
        return false;
    }
}
