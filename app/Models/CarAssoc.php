<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarAssoc extends Model
{
    use HasFactory;
    protected $table = 'carAssoc';

    public $timestamps = false;

    protected $fillable = [
        'carId',
        'carLink',
    ];
}
