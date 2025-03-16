<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playstation extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'year', 'price'];
}
