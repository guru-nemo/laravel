 
@extends('layouts.app')

@section('content')

<div class="container inner">

    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

 	
	@if (count($users) > 0)
	<div class="col" align="center">
		<h2>Тurists</h2>
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
                  <div>{{ $user->turists->name }}</div>
				  </a>
                </td>
                <td class="table-text">
                  <div>{{ $user->turists->surname }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $user->turists->second_name }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $user->turists->birth_date }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $user->turists->tel }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $user->email }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $user->turists->passport }}</div>
                </td>
				<td class="table-text">
                  <div>{{ $user->turists->passport_date }}</div>
                </td>
	
				<td class="table-text">
				<form action="{{ url('turist/edit/'.$user->id) }}" method="GET">
				  {{ csrf_field() }}
				  <button type="submit" id="turist-edit-{{ $user->id }}" class="btn btn-danger">
					<i class="fa fa-btn fa-trash"></i>Edit
				  </button>
				  </form>
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
   @endif

</div>

@endsection