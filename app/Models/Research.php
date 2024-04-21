<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'date',
    ];

    /**
     * Get the researcher that has the research.
     */
    public function researcher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Researcher::class, 'researcher_id', 'id');
    }

    /** 
     * Get the field that belongs to the research.
     */
    public function field(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ResearchField::class, 'research_field_id');
    }

    /** 
     * Get the type that belongs to the research.
     */
    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ResearchType::class, 'research_type_id');
    }

    /**
     * Get the publications that belong to the research.
     */
    public function publications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Publication::class);
    }

    /** 
     * Get the patents that belong to the research.
     */
    public function patents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Patent::class);
    }
}
