<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Request extends Model
{
    protected $fillable = ['user_id', 'request_date', 'destination', 'message'];
	 
	public function user()
	  {
		return $this->belongsTo(User::class);
	  }
  
}
