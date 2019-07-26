<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
	
 protected $request;
	 
  public function __construct(Request $request)
	  {
		$this->request = $request;
	  }
  
  public function index(Request $request)
	{
		return view('tasks.index', [
				  'tasks' => $this->tasks->forUser($request->user()),
					]);
	}
	
	public function store(Request $request)
	{
	  $this->validate($request, [
		'name' => 'required|max:255',
	  ]);

	   $request->user()->tasks()->create([
			'name' => $request->name,
		  ]);

		return redirect('/tasks');
	}
	
	public function destroy(Request $request, Task $task)
		{
			$this->authorize('destroy', $task);

			$task->delete();

			return redirect('/tasks');
		}

}
