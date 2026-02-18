<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawDoctor extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'raw_doctor';

    protected $fillable = [
        'id',
        'name',
    ];

    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    public function schedules()
    {
        return $this->hasMany(RawDoctorSchedule::class, 'raw_doctor_id', 'id');
    }

    public function reservations()
    {
        return $this->hasMany(RawCusReservation::class, 'raw_doctor_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(RawCusResService::class, 'raw_doctor_id', 'id');
    }
}
