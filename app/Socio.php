<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Socio extends Model
{
    
    protected $table = 'socios';
    
    public $timestamps = false;
    
    protected $fillable = [
        'name', 'edad', 'group', 'status', 'level'
    ];
    
}
