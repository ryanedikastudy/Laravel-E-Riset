<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
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
     * Get the research that belongs to the publication.
     */
    public function research(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Research::class);
    }
}
