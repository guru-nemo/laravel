<?php

namespace App\Http\Controllers\Api;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;
use App\User;
use App\Turist;
use App\Http\Model\Api\TuristModel;

class TuristController extends Controller
{

	/*public function __construct()
		  {
			$this->middleware('auth');
		  }*/
  
    public function index()
		{
			return view('turists_api.index', [
						   'users' => User::with('turists')->get()
							]);
		}
		
	public function show(Request $request, $id)
		{
			$user = User::where('id', '=', $id)->with('turists')->first();
			return response()->json($user, 201);
		}
		
	public function update(Request $request, $id)
		{
			$model = new TuristModel($request);
			if($validator = $model-> validate()){
				return response()->json(['errors'=>$validator->errors()]);
			}
			else{
				$model->save_turist($id);
			}	

			$user = User::where('id', '=', $id)->with('turists')->first();
			return response()->json($user, 201);
		}
	
	public function edit(Request $request, $id)
	{
		if ($request->isMethod('post')){
			
			$model = new TuristModel($request);
			
			if($validator = $model-> validate()){
				return Redirect::back()
								  ->withErrors($validator)
								  ->withInput($request->all);
			}
			else{
				$model->save_turist($id);
			}	

			return redirect('/turists');
		}
		else{
			return view('turists.edit', [
					   'user' => User::where('id', '=', $id)->with('turists')->first()
						]);
		}
	}
	
	public function destroy(Request $request, User $user)
		{
			//$this->authorize('destroy', $user);
			
			$user->delete();

			return redirect('/turists');
		}

}
