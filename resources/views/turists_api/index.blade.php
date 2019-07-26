 
@extends('layouts.app_api')

@section('content')

<div class="container inner">

    <div class="alert alert-danger" id="errors" style="display:none;">
    <strong>Упс! Что-то пошло не так!</strong>
    <br><br>
    <ul id="errors_ul"></ul>
	</div>
 	
	@if (count($users) > 0)
	<div id="turists_table">
	<div class="col" align="center">
		<h2>Тurists API</h2>
	</div>
    <div class="panel panel-default">

        <table class="table table-striped">
          <thead>
            <tr>
				<th class="table-text">
                  <div>Name</div>
                </th>
				<th class="table-text">
                  <div>Surname</div>
                </th>
				<th class="table-text">
                  <div>Second Name</div>
                </th>
				<th class="table-text">
                  <div>Date of birth</div>
                </th>
				<th class="table-text">
                  <div>Tel.</div>
                </th>
				<th class="table-text">
                  <div>E-mail</div>
                </th>
				<th class="table-text">
                  <div>Passport</div>
                </th>
				<th class="table-text">
                  <div>Passport issue</div>
                </th>
				<th class="table-text"></th>
				<th class="table-text"></th>
			</tr>
          </thead>

          <tbody>
            @foreach ($users as $user)
			
              <tr scope="col">
                <td class="table-text">
				  <a href="{{ url('turist/request/'.$user->id) }}">
                  <div id="turist-name-{{ $user->id }}">{{ $user->turists->name }}</div>
				  </a>
                </td>
                <td class="table-text">
                  <div id="turist-surname-{{ $user->id }}">{{ $user->turists->surname }}</div>
                </td>
				<td class="table-text">
                  <div id="turist-second_name-{{ $user->id }}">{{ $user->turists->second_name }}</div>
                </td>
				<td class="table-text">
                  <div id="turist-birth_date-{{ $user->id }}">{{ $user->turists->birth_date }}</div>
                </td>
				<td class="table-text">
                  <div id="turist-tel-{{ $user->id }}">{{ $user->turists->tel }}</div>
                </td>
				<td class="table-text">
                  <div id="turist-email-{{ $user->id }}">{{ $user->email }}</div>
                </td>
				<td class="table-text">
                  <div id="turist-passport-{{ $user->id }}">{{ $user->turists->passport }}</div>
                </td>
				<td class="table-text">
                  <div id="turist-passport_date-{{ $user->id }}">{{ $user->turists->passport_date }}</div>
                </td>
	
				<td class="table-text">
				  {{ csrf_field() }}
				  <button type="submit" id="{{ $user->id }}" class="btn btn-danger" onclick="edit(this.id)">
					<i class="fa fa-btn fa-trash"></i>Edit
				  </button>
				 </td> 
				 
				 <td class="table-text">
				 <form action="{{ url('turist/delete/'.$user->id) }}" method="POST">
				  {{ csrf_field() }}
				  {{ method_field('DELETE') }}
					<button type="submit" id="turist-delete-{{ $user->id }}" class="btn btn-danger">
					<i class="fa fa-btn fa-trash"></i>Delete
				  </button>
					</form>
				</td>
              </tr>
            @endforeach
			
          </tbody>
        </table>
    </div>
	</div>
   @endif

	<div id="turist_edit" style="display:none;">
      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
          <input type="text" name="name" id="turist-name" class="form-control" required>
      </div>
	  
	  <div class="form-group">
        <label for="surname" class="col-sm-3 control-label">Surname</label>
          <input type="text" name="surname" id="turist-surname" class="form-control" required>
      </div>
	 
	  <div class="form-group">
        <label for="second_name" class="col-sm-3 control-label">Second_name</label>
          <input type="text" name="second_name" id="turist-second_name" class="form-control" required>
      </div>
	  
	  <div class="form-group">
        <label for="birth_date" class="col-sm-3 control-label">Date of birth</label>
          <input type="date" name="birth_date" id="turist-birth_date" class="form-control" required>
      </div>
	  
	  <div class="form-group">
        <label for="tel" class="col-sm-3 control-label">Tel.</label>
          <input type="tel" name="tel" id="turist-tel" class="form-control" required>
      </div>
	  
	  <div class="form-group">
        <label for="tel" class="col-sm-3 control-label">E-mail.</label>
          <input type="text" name="email" id="turist-email" class="form-control" value="{{ old('email') ?: $user->email }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="passport" class="col-sm-3 control-label">Passport</label>
          <input type="text" name="passport" id="turist-passport" class="form-control">
      </div>

	<div class="form-group">
        <label for="passport_date" class="col-sm-3 control-label">Passport issue</label>
          <input type="date" name="passport_date" id="turist-passport_date" class="form-control">
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3" align="center">
          <button id="update_turist" type="submit" class="btn btn-default" onclick="update_turist(this.id);">
            <i class="fa fa-plus"></i> Change data
          </button>
        </div>
      </div>
    </div>

</div>

@endsection