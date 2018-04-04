<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Storage for Interests.
 */
class Interest extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'interests',
    ];

    /**
     * Profile rules.
     */
    protected $rules = [
        'interests' => 'required|string',
    ];

    /**
     * Get the user who owns the profile
     */
    public function profileInterest()
    {
        return $this->hasMany('App\Models\ProfileInterest', 'interest_id');
    }
}
