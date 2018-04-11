<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Storage for user profile interests
 */
class ProfileInterest extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_id',
        'interest_id',
    ];

    /**
     * Profile rules.
     */
    protected $rules = [
        'profile_id' => 'required|numeric',
        'interest_id' => 'required|numeric',
    ];

    /**
     * Get the user who owns the profile
     */
    public function profile()
    {
        return $this->belongsTo('App\Models\profile', 'id');
    }

    /**
     * Get the user interests.
     */
    public function interests()
    {
        return $this->belongsTo('App\Models\interest', 'id');
    }
}
