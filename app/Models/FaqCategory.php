<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqCategory extends Model
{
    protected $fillable = ['name'];

    public function faqItems(): HasMany
    {
        return $this->hasMany(FaqItem::class);
    }
}

