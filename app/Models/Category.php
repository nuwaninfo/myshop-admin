<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    const STATUS = ['ACTIVE' => 1, 'INACTIVE' => 0];
    protected $fillable = ['name', 'description', 'slug', 'status'];
}
