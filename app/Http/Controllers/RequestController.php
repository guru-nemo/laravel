<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;
use App\User;
use App\Request;
use App\Http\Model\RequestModel;

class RequestController extends Controller
{

	public function __construct()
		  {
			$this->middleware('auth');
		  }
  
	public function index($id)
		{
			return view('requests.index', [
						   'user' => User::where('id', '=', $id)->with('requests')->first()
							]);
		}
		
	public function add(Req $request, $id)
		{
			return view('requests.index', [
						   'user' => User::where('id', '=', $id)->with('turists')->with('requests')->get()
							]);
		}
	
	public function edit(Req $request, $id)
	{
		if ($request->isMethod('post')){

			$model = new RequestModel($request);

			if($validator = $model-> validate()){
				return Redirect::back()
								  ->withErrors($validator)
								  ->withInput($request->all);
			}
			else{
				$model->save_request($id);
			}	

			return redirect('/turist/request/'.$request->user_id);
		}
		else{
			$user_request = Request::where('id', '=', $id)->with('user')->first();
			return view('requests.edit', [
					   'request' => $user_request,
					   'user_id' => $user_request->user_id
						]);
		}
	}
	
	public function destroy(Request $request)
		{
			//$this->authorize('destroy', $user);
			$user_id = $request->user_id;
			$request->delete();

			return redirect('/turist/request/'.$user_id);
		}

}
