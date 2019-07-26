<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Turist extends Model
{
    protected $fillable = [
        'name', 'surname', 'second_name',
    ];
	 
	public function user()
	  {
		return $this->belongsTo(User::class);
	  }
  
}
