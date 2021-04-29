<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    /**
     * User HasMany Videos
     */
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    } 
}
