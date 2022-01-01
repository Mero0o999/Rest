<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $dates = [
        'startTime',
       
        'endTime',
    ];
    protected $fillable = [
        'doctorName', 'startTime','endTime'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id');
    }
}
