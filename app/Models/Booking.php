<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'playstation_id', 'payment_id', 'date', 'total_price', 'status',
    ];

    /**
     * Relationship: Booking belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Booking belongs to a Playstation.
     */
    public function playstation()
    {
        return $this->belongsTo(Playstation::class);
    }

    /**
     * Relationship: Booking belongs to a Payment (optional).
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
