<?php

namespace App\Http\Model\Api;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Redirect;
use Validator;

use App\User;
use App\Turist;

class TuristModel extends Model
{
	protected $request;
	 
	public function __construct(Request $request)
	  {
		$this->request = $request;
	  }
	
	public function validate()
	  {
		$validator = Validator::make($this->request->all(), [
					    'name' => 'bail|required|max:50',
						'surname' => 'bail|required|max:100',
						'second_name' => 'bail|required|max:100',
						'birth_date' => array(
											'bail',
											'required',
											'regex:(^((19|20)[0-9]{2}-)([0-9]{1,2}-)([0-9]{1,2})$)'
										),
						'tel' => array(
											'bail',
											'required',
											'regex:(^\+([0-9]{1}-)([0-9]{3}-)([0-9]{3}-)([0-9]{2}-)([0-9]{2})$)'
										),
						'email' => 'bail|required|email',
						'passport' => 'nullable|integer',
						'passport_date' => array(
											'nullable',
											'regex:(^((19|20)[0-9]{2}-)([0-9]{1,2}-)([0-9]{1,2})$)'
										)
								]);
			if ($validator->fails())
				return $validator;
			else
				return false;
	  }
	  
	  public function save_turist($id){
		  
		    $user = User::where('id', '=', $id)->with('turists')->first();
			
			$user->email = $this->request->email;
			$user->save();
			
			$turist = Turist::where('user_id', '=', $id)->first();
			$turist->name = $this->request->name;
			$turist->surname = $this->request->surname;
			$turist->second_name = $this->request->second_name;
			$turist->birth_date = $this->request->birth_date;
			$turist->tel = $this->request->tel;
			$turist->passport = $this->request->passport;
			$turist->passport_date = $this->request->passport_date;
		  
			$turist->save();
	  }
  
}
