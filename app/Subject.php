<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

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
                  'teacher_id',
                  'student_class_id'
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
     * Get the teacher for this model.
     *
     * @return App\User
     */
    public function teacher()
    {
        return $this->belongsTo('App\User','teacher_id');
    }

    /**
     * Get the studentClass for this model.
     *
     * @return App\StudentClass
     */
    public function studentClass()
    {
        return $this->belongsTo('App\StudentClass','student_class_id');
    }



}
