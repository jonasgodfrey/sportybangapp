<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'amount',
        'transaction_reference',
        'action_date',
        'status',
        'balance_before',
        'balance_after',
        'transaction_type_id',
        'transaction_remarks_id',
        'transaction_date',
        'credit_debit_type_id',

    ];
}
