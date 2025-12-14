<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Landing extends Model
{
    protected $fillable = ['name', 'is_active', 'category_id'];
    protected $hidden = ['price'];
    protected $casts = ['created_at' => 'datetime:d.m.Y H:i:s', 'updated_at' => 'datetime:d.m.Y H:i:s'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
