<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawDocService extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'raw_doc_service';

    protected $fillable = [
        'id',
        'name',
        'duration_minutes',
        'price',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    protected $casts = [
        'duration_minutes' => 'double',
        'price' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function reservationServices()
    {
        return $this->hasMany(RawCusResService::class, 'raw_doc_service_id', 'id');
    }
}
