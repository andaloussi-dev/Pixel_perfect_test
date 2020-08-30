<?php

namespace App\Issue;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guared = [
        'name', 'email', 'password',
    ];
    
    public function user(){
        return $this->belongsTo('App\user');
    }
}
