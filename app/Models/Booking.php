<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_type',
        'event_date',
        'guests',
        'location',
        'notes',
        'service_id',
    ];

    /**
     * Optional relationship if you have a Service model.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
