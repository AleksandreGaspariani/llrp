<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'account_statuses';

    public $timestamps = false;

    public $with = ['user'];

    public function user(){
        return $this->belongsTo(AccountForApprove::class, 'ID', 'userID');
    }
}
