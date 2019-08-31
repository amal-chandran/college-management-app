<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'email',
                  'password'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
               'created_at'
           ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the userHasPermission for this model.
     *
     * @return App\Models\UserHasPermission
     */
    public function userHasPermission()
    {
        return $this->hasOne('App\Models\UserHasPermission','user_id','id');
    }

    /**
     * Get the userHasRole for this model.
     *
     * @return App\Models\UserHasRole
     */
    public function userHasRole()
    {
        return $this->hasOne('App\Models\UserHasRole','user_id','id');
    }



}
