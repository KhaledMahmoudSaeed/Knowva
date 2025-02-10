<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function reading(): HasMany
    {
        return $this->hasMany(Read::class);
    }
    public function writing(): HasMany
    {
        return $this->hasMany(Write::class);
    }
    public function listing(): HasMany
    {
        return $this->hasMany(Listen::class);
    }
    public function speaking(): HasMany
    {
        return $this->hasMany(Speak::class);
    }
}
