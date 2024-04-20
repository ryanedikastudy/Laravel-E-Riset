<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'status'
    ];

    /**
     * Get the user that associated with the researcher.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the researches that belong to the researcher.
     */
    public function researches(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Research::class);
    }

    /**
     * Get the publications that belong to the researcher through the researches.
     */
    public function publications(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Publication::class, Research::class);
    }

    /**
     * Get the patents that belong to the researcher through the researches.
     */
    public function patents(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Patent::class, Research::class);
    }
}
