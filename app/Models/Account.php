<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'conta';

    protected $fillable = [
        'saldo'
    ];

}
