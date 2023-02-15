<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'note', 'start_event', 'end_event', 'event_date', 'user_id', 'student_id',
    ];

    // protected $appends = ['student'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    // public function student()
    // {
    //     return $this->belong(Student::class);
    // }
}
