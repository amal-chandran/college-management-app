<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student_classes';

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
                  'batch',
                  'branch',
                  'class_teacher_id'
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
     * Get the classTeacher for this model.
     *
     * @return App\User
     */
    public function classTeacher()
    {
        return $this->belongsTo('App\User','class_teacher_id');
    }



}
