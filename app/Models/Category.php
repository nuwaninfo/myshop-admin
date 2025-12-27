<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const STATUS = ['ACTIVE' => 1, 'INACTIVE' => 0];
    protected $fillable = ['name', 'description', 'slug', 'status'];
}
