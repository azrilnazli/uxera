<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category_id',
    ];

    /**
     * Get the user that owns the video.
     */
    public function video()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the Category that owns the Video.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
