<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Feature;
use App\Models\Schedule;
use App\Models\Appoinment;
use App\Models\DepartmentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Department extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function appoinments()
    {
      return $this->hasMany(Appoinment::class);
    }
    public function features()
    {
        return $this->hasMany(Feature::class);

    }
    public function doctors()
    {
        return $this->hasMany(Doctor::class);

    }
    public function schedules()
    {
        return $this->belongsToMany(Schedule::class);

    }
}
