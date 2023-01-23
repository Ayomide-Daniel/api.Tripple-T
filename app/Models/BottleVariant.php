<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Enums\BottleNameEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BottleVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'bottle_id',
        'name',
        'slug',
        'price',
        'description',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * Get the bottle that owns the BottleVariant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bottle(): BelongsTo
    {
        return $this->belongsTo(Bottle::class);
    }
    
    // set slug attribute from bottle_id and name
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bottle_variant) {
            $bottle_variant->slug = Str::slug($bottle_variant->bottle->name . '-' . $bottle_variant->name);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
