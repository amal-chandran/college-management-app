<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendees';

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
        'student_id',
        'attendance_id',
        'status'
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
     * Get the student for this model.
     *
     * @return App\User
     */
    public function student()
    {
        return $this->belongsTo('App\User', 'student_id');
    }

    /**
     * Get the attendance for this model.
     *
     * @return App\Attendance
     */
    public function attendance()
    {
        return $this->belongsTo('App\Attendance', 'attendance_id');
    }
}
