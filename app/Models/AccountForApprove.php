<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountForApprove extends Model
{
    use HasFactory;

    protected $table = 'account_for_approve';

    public $timestamps = false;

    public $with = ['status'];

    public function status(){
        return $this->belongsTo(Status::class ,'userID', 'ID');
    }


}
