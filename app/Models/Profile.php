<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Storage for user profile
 */
class Profile extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'bio',
    ];

    /**
     * Profile rules.
     */
    protected $rules = [
        'user_id' => 'required|string',
        'bio' => 'string',
    ];

    /**
     * Get the user who owns the profile
     *
     * @return Relationship
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the profile interests for the user.
     *
     * @return Relationship
     */
    public function profileInterests()
    {
        return $this->hasMany('App\Models\ProfileInterest');
    }

    /**
     * Get the interests of the user.
     *
     * @return array interests
     */
    public function getInterests()
    {
        $interests = [];

        if ($profileInterests = ProfileInterest::where('profile_id', $this->id)->get()) {
            foreach ($profileInterests as $profileInterest) {
                $interests[] = $profileInterest->interests()->first();
            }
        }

        return $interests;
    }
}
