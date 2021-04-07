<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'recipes';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'ingredients',
        'url',
        'tags',
        'status',
        'author_id',
        'date',
        'updated_at'
    ];

    protected $visible = [
        'id',
        'title',
        'content',
        'ingredients',
        'url',
        'tags',
        'status',
        'author_id',
        'date',
        'updated_at',
        'created_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'recipe_id', 'id');
    }
}
