@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
				@if (Auth::user()->is_admin === 1)
								<p>Witaj Administratorze!</p>
								<a href="{{ route('panel.newsletter') }}">Wyślij Maila do Newslettera!</a>
								<a href="{{ route('panel.shopping.admin') }}">Sklep!</a>
				<table>
					<thead>
							<tr>
								<th>ID:</th>
								<th>Name:</th>
                                <th>Password:</th>
								<th>Email:</th>
							</tr>
					</thead>
					<tbody>
							@foreach($users as $user)
							<tr>
								<td> <a href="{{ route('panel.user.show',$user) }}">{{ $user->id }}</a></td>
								<td>{{ $user->name }}</td>
                                <td>{{ $user->password }}</td>
								<td>{{ $user->email }}</td>
							@endforeach
							</tr>
					</tbody>
					<thead>
							<tr>
                            	<th>email_verified:</th>
								<th>is_admin:</th>
								<th>Last_active:</th>
                                <th>Phone:</th>
                                <th>Opcje</th>
							</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->email_verified_at }}</td>
								<td>{{ $user->is_admin }}</td>
								<td>{{ $user->last_active }}</td>
                            	<td>{{ $user->phone }}</td>
                            	<td> <a href="{{ route('panel.user.delete',$user) }}">Usuń usera!</a> </td>
						@endforeach
							</tr>
					</tbody>
				</table>
				@else
				<?php $user = Auth::user(); ?>
				<table>
					<thead>
							<tr>
								<th>ID:</th>
								<th>Name:</th>
								<th>Email:</th>
							</tr>
					</thead>
					<tbody>
							<tr>
								<td> <a href="{{ route('panel.user.show',$user) }}">{{ $user->id }}</a></td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
							</tr>
					</tbody>
					<thead>
							<tr>
                            	<th>email_verified:</th>
                                <th>Phone:</th>
							</tr>
					</thead>
					<tbody>
							<tr>
								<td>{{ $user->email_verified_at }}</td>
                            	<td>{{ $user->phone }}</td>
							</tr>
					</tbody>
				</table>
				@endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
                <p class="" id="sessiondelete" style="display:none">User usuniety</p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
<script>
@if(Session::has('success'))
	var uniqSuccess ='{{uniqid('s')}}';
	if(sessionStorage){
		if(!sessionStorage.getItem('modal-' + uniqSuccess)){
			Swal.fire({icon:'success',title:'Sukces 😎',html:"{!! Session::get('success')!!}"});
		}
		sessionStorage.setItem('modal-' + uniqSuccess, '1');}
@endif
@if(Session::has('error'))
	var uniqError ='{{uniqid('e')}}';
		if(sessionStorage)
		{
			if(!sessionStorage.getItem('modal-' + uniqError)) {
				Swal.fire({icon:'error',title:'Coś poszło nie tak ☹️',html:"{!! Session::get('error')!!}"});
			}
			sessionStorage.setItem('modal-' + uniqError, '1');
		}
@endif
@isset($errors)
	<?php $errorss = ''; ?>
		@foreach ($errors->all() as $error)
			<?php $errorss .= $error.'<br>'; ?>
		@endforeach
	@if ($errorss != '')
		var uniqErrors ='{{uniqid('es')}}';
		if(sessionStorage)
		{
			if(!sessionStorage.getItem('modal-' + uniqErrors)){
				Swal.fire({icon:'error',title:'Coś poszło nie tak ☹️',html:"{!! $errorss !!}"});
			}
			sessionStorage.setItem('modal-' + uniqErrors,'1');
		}
	@endif
@endisset
</script>
@endsection
