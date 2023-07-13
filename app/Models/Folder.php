<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    
    use HasFactory;
    protected $table = 'folders';
    protected $fillable = 
    [
        'id',
        'title',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}
