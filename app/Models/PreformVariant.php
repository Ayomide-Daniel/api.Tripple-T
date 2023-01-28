<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreformVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'preform_id',
        'name',
        'slug',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
    ];

    /**
     * Get the preform that owns the PreformVariant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preform(): BelongsTo
    {
        return $this->belongsTo(Preform::class);
    }

    // set slug attribute from preform_id and name
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($preform_variant) {
            $preform_variant->slug = Str::slug($preform_variant->preform->name . '-' . $preform_variant->name);
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
