 
@extends('layouts.app')

@section('content')

<div class="container inner">

    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <form action="{{ url('turist/edit/'.$user->id) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="name" class="col-sm-3 control-label">Name</label>
          <input type="text" name="name" id="turist-name" class="form-control" value="{{ old('name') ?: $user->turists->name }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="surname" class="col-sm-3 control-label">Surname</label>
          <input type="text" name="surname" id="turist-surname" class="form-control" value="{{ old('surname') ?: $user->turists->surname }}" required>
      </div>
	 
	  <div class="form-group">
        <label for="second_name" class="col-sm-3 control-label">Second_name</label>
          <input type="text" name="second_name" id="turist-second_name" class="form-control" value="{{ old('second_name') ?: $user->turists->second_name }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="birth_date" class="col-sm-3 control-label">Date of birth</label>
          <input type="date" name="birth_date" id="turist-birth_date" class="form-control" value="{{ old('birth_date') ?: $user->turists->birth_date }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="tel" class="col-sm-3 control-label">Tel.</label>
          <input type="tel" name="tel" id="turist-tel" class="form-control" value="{{ old('tel') ?: $user->turists->tel }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="tel" class="col-sm-3 control-label">E-mail.</label>
          <input type="text" name="email" id="turist-email" class="form-control" value="{{ old('email') ?: $user->email }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="passport" class="col-sm-3 control-label">Passport</label>
          <input type="text" name="passport" id="turist-passport" class="form-control" value="{{ old('passport') ?: $user->turists->passport }}">
      </div>

	<div class="form-group">
        <label for="passport_date" class="col-sm-3 control-label">Passport issue</label>
          <input type="date" name="passport_date" id="turist-passport_date" class="form-control" value="{{ old('passport_date') ?: $user->turists->passport_date }}">
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3" align="center">
          <button type="submit" id="turist-edit-{{ $user->id }}" class="btn btn-default">
            <i class="fa fa-plus"></i> Change data
          </button>
        </div>
      </div>
    </form>

</div>

@endsection