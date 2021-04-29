<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'avatar', 'user_id',
    ];

    /**
     * Get the User who owns the Profile
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
