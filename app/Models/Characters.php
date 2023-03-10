<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cars;

class Characters extends Model
{
    use HasFactory;
    protected $table = 'characters';

    public function cars(){
        return $this->hasMany(Characters::class);
    }
}
