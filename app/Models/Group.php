<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'creator_id'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_members');
    }
}
