<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BottleVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'bottle_id',
        'name',
    ];
}
