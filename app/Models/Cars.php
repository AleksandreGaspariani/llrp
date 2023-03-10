<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Characters;

class Cars extends Model
{
    use HasFactory;
    protected $table = 'cars';

    public function characters(){
        return $this->belongsTo(Characters::class);
    }
}
