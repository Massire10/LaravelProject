<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'contacts';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'message',
        'date',
        'updated_at'
    ];

    protected $visible = [
        'id',
        'name',
        'email',
        'message',
        'date',
        'updated_at',
        'created_at'
    ];
}
