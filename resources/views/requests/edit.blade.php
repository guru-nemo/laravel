 
@extends('layouts.app')

@section('content')

<div class="container inner">

    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')


    <form action="{{ url('turist/request/edit/'.$request->id) }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="request_date" class="col-sm-3 control-label">Date</label>
          <input type="date" name="request_date" id="request-request_date" class="form-control" value="{{ old('request_date') ?: $request->request_date }}" required>
      </div>
	  
	  <div class="form-group">
        <label for="destination" class="col-sm-3 control-label">Destination</label>
          <input type="text" name="destination" id="request-destination" class="form-control" value="{{ old('destination') ?: $request->destination }}" required>
      </div>
	 
	  <div class="form-group">
        <label for="message" class="col-sm-3 control-label">Message</label>
          <input type="text" name="message" id="request-message" class="form-control" value="{{ old('message') ?: $request->message }}" required>
      </div>

      <input type="hidden" name="user_id" id="request-user_id" class="form-control" value="{{ old('user_id') ?: $user_id }}">

      <div class="form-group">
        <div class="col-sm-offset-3" align="center">
          <button type="submit" id="turist-request-edit-{{ $request->id }}" class="btn btn-default">
            <i class="fa fa-plus"></i> Change data
          </button>
        </div>
      </div>
    </form>

</div>

@endsection