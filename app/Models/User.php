<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
//    use Notifiable, HasApiTokens;
    use Notifiable;

    static $allowedFilter = [];

    const GENDER = ['male','female','other'];
    const GENDER_DEFAULT = 'male';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    /**
     * Login with email/username/mobile
     *
     * @param $identifier
     * @return mixed
     */
    public function findForPassport($identifier) {

        return $this->orWhere('email', $identifier)->orWhere('username', $identifier)->orWhere('mobile',$identifier)->first();
    }

    /**
     * Validate the account is active or not
     *
     * @param $password
     * @return bool
     */
    public function validateForPassportPasswordGrant($password)
    {
        //check for password
        if (Hash::check($password, $this->getAuthPassword())) {
            //is user active?
            return $this->active;
        }
    }
}
