<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_info extends Model
{   
	 protected $table = 'users_info';
	 protected $primaryKey = 'id';
	
     protected $fillable = [
        'name', 'country', 'phone_number','date_of_birth','id','email_id'
    ];
}
