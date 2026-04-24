<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'priority', 'category_id'];

    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    
  public function users(): BelongsToMany
{
    
    return $this->belongsToMany(User::class, 'note_user')->withPivot('role')->withTimestamps();
}
}
