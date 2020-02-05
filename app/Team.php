<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
}
