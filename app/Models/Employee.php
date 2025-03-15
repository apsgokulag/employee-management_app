<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'employees';

    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'dob',
        'doj',
    ];

    protected $casts = [
        'dob' => 'date',
        'doj' => 'date',
    ];
}
?>