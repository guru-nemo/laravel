 
@extends('layouts.app')

@section('content')


<div class="container inner">

    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
<a href="{{ url('/') }}">Back to turists table</a>
	<div class="col" align="center">
		<h2>Requests of turist {{ $user->turists->name }} {{ $user->turists->surname }}</h2>
    </div>
	
    <div class="panel panel-default">

        <table class="table table-striped table-bordered">
          <thead>
 				<th class="table-text">
                  <div>Date</div>
                </th>
				<th class="table-text">
                  <div>Destination</div>
                </th>
				<th class="table-text">
                  <div>Message</div>
                </th>
				<th class="table-text">
                </th>
				<th class="table-text">
                </th>
			</tr>
          </thead>
          <tbody>
			@if (count($user->requests) > 0)
				@foreach ($user->requests as $request)
              <tr scope="col">
                <td class="table-text">
                  <div>{{ $request->request_date }}</div>
                </td>
                <td class="table-text">
                  <div>{{ $request->destination }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $request->message }}</div>
                </td>
				<td class="table-text">
				<form action="{{ url('turist/request/edit/'.$request->id) }}" method="GET">
				  {{ csrf_field() }}
				  <button type="submit" id="turist-request-edit-{{ $request->id }}" class="btn btn-danger">
					<i class="fa fa-btn fa-trash"></i>Edit
				  </button>
				  </form>
				 </td> 
				 
				 <td class="table-text">
				 <form action="{{ url('turist/request/delete/'.$request->id) }}" method="POST">
				  {{ csrf_field() }}
				  {{ method_field('DELETE') }}
				  <input type="hidden" name="user_id" id="request-user_id" class="form-control" value="{{ old('user_id') ?: $user->id }}">
					<button type="submit" id="turist-request-delete-{{ $request->id }}" class="btn btn-danger">
					<i class="fa fa-btn fa-trash"></i>Delete
					</button>
					</form>
				</td>
              </tr>
				@endforeach
			@endif
          </tbody>
        </table>
			
		
		<form action="{{ url('turist/request/add/'.$user->id) }}" method="POST" class="form-horizontal">
		  {{ csrf_field() }}
			<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Date</label>
			    <input type="date" name="request_date" id="request-request_date" class="form-control" value="{{ old('request_date') }}" required>
			</div>
			
			<div class="form-group">
			  <label for="name" class="col-sm-3 control-label">Destination</label>
			  <input type="text" name="destination" id="request-destination" class="form-control" value="{{ old('destination') }}" required>
			</div>
			
			<div class="form-group">
			  <label for="name" class="col-sm-3 control-label">Message</label>
			  <input type="text" name="message" id="request-message" class="form-control" value="{{ old('message') }}" required>
			</div>
			
			<input type="hidden" name="user_id" id="request-user_id" class="form-control" value="{{ old('user_id')?:$user->id }}">
			
			<div class="col-sm-offset-3" align="center">
			  <button type="submit" id="turist-request-add-{{ $user->id }}" class="btn btn-danger">
				<i class="fa fa-btn fa-trash"></i>Add new request
			  </button>
			</div>
		  </div>
		</form>
    </div>

</div>

@endsection