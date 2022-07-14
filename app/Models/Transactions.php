<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'transaction_type',
        'action_date',
        'status',
    ];
}
