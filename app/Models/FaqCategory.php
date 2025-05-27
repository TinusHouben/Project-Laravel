<?php

// app/Models/FaqCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqCategory extends Model
{
    protected $fillable = ['name'];

    // Relatie met FAQ Items
    public function faqItems(): HasMany
    {
        return $this->hasMany(FaqItem::class);
    }
}


