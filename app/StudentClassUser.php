<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClassUser extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_class_user';

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
                  'student_class_id',
                  'user_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the studentClass for this model.
     *
     * @return App\StudentClass
     */
    public function studentClass()
    {
        return $this->belongsTo('App\StudentClass','student_class_id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }



}
