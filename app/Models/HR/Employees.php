<?php

namespace App\Models\HR;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model {
    use HasFactory;

    protected $guarded = [
        'id',

    ];
}
