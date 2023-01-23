<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use App\Enums\BottleNameEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bottle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $casts = [
        'name' => BottleNameEnum::class
    ];
}