<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'logo', 'link', 'slug', 'languages_used', 'functionality', 'type_id'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
