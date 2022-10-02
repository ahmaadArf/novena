<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Feature extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function doctor()
    {
      return $this->belongsTo(Doctor::class);
    }
    public function department()
    {
      return $this->belongsTo(Department::class);
    }
}
