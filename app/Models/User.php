<?php

namespace App\Models;

use App\Models\CMS\Menu;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
// use Laravel\Scout\Searchable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    public  static $allowedFilters = ['username'];

    public  static $allowedSorts = ['username'];

    const GENDER = ['male','female','other'];

    const GENDER_DEFAULT = 'male';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'username', 'email', 'password', 'mobile','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'password', 'remember_token',
    ];




    protected $casts = [

      'active' => 'boolean'

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

    public function active()
    {
        return $this->getAttribute('active');
    }

    public function isRoot()
    {
        return $this->getAttribute('username') === config('admin.username');
    }

    /**
     * Set password attribute
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
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


    public  function getAssignedMenu()
    {

        return $this->isRoot() ?  Menu::all() : $this->getMenusViaRoles();

    }


    /**
     * Return all the permissions the model has via roles.
     */
    public function getMenusViaRoles()
    {
        return $this->load('roles', 'roles.menus')
            ->roles->flatMap(function ($role) {
                return $role->menus;
            })->sort()->values();
    }

}
