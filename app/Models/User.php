<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
    ];

    /**
     * User model rules
     *
     * @var array
     */
    protected $rules =[
        'user_id' => 'required|string',
        'email' => 'required|string'
    ];

    /**
     * Get the profile associated with the user
     *
     * @return relationship
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');
    }
}
