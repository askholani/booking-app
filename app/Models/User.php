<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes;

    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'phone_number',
        'address',
        'username',
        // 'level_id'2,
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    /**
     * Define the relationship between User and Level.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function level()
    // {
    //     return $this->belongsTo(Level::class);
    // }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

}
