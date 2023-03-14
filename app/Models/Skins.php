<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skins extends Model
{
    use HasFactory;

    protected $table = 'skinsAssoc';

    public $timestamps = false;

    protected $fillable = [
        'model',
        'link',
    ];
}
