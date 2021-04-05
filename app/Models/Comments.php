<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'author_id',
        'recipes_id',
        'date',
        'updated_at'
    ];

    protected $visible = [
        'id',
        'content',
        'author_id',
        'recipes_id',
        'date',
        'updated_at',
        'created_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'id', 'author_id');
    }

    public function recipes()
    {
        return $this->belongsTo(Recipes::class, 'id', 'recipes_id');
    }
}
