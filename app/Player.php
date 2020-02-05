<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    protected $table = 'players';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
    public function team(){
        return $this->belongsTo('App\User');
    }
}
