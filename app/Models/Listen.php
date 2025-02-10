<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listen extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function lang(): BelongsTo
    {
        return $this->belongsTo(Lang::class);
    }
}
