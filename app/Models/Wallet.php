<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'balance',
        'account_number',
        'bank_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->latest();
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
