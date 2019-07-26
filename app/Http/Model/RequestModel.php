<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request as Req;
use Redirect;
use Validator;

use App\User;
use App\Request;

class RequestModel extends Model
{
	protected $request;
	 
	public function __construct(Req $request)
	  {
		$this->request = $request;
	  }
	
	public function validate()
	  {
		$validator = Validator::make($this->request->all(), [
						'request_date' => array(
															'bail',
															'required',
															'regex:(^((19|20)[0-9]{2}-)([0-9]{1,2}-)([0-9]{1,2})$)'
														),
					    'destination' => 'bail|required|max:50',
						'message' => 'max:3000'
								]);
			if ($validator->fails())
				return $validator;
			else
				return false;
	  }
	  
	  public function save_request($id){
		
		if($this->request->segment(3) == 'add')
		{
			$user = User::where('id', '=', $id)->first();
			$user->requests()->create([
							'request_date' => $this->request->request_date,
							'destination' => $this->request->destination,
							'message' => $this->request->message,
			]);
		}
		else
		{
			$request = Request::where('id', '=', $id)->first();
			$request->request_date = $this->request->request_date;
			$request->destination = $this->request->destination;
			$request->message = $this->request->message;
			$request->save();
		}
	  }
  
}
