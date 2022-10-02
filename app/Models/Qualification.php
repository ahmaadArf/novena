<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Qualification extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function doctor()
    {
      return $this->belongsTo(Doctor::class);
    }

}
