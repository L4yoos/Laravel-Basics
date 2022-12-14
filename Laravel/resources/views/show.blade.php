@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action=" {{ route('panel.user.update', $user) }} " method="POST">@method('put')
                @csrf
					<p>Twój stan konta: <input type="text" value="{{ $user->wallet->balance }}" name="balance"></p>
                    <p>ID: <input type="text" value="{{ $user->id }}" placeholder="ID" disabled></p>
                    <p>Name: <input type="text" value="{{ $user->name }}" placeholder="Name" name="name"></p>
                    <p>Password: <input type="text" value="" placeholder="password" name="password"></p>
                    <p>Password confirmed: <input type="text" value="" placeholder="password_confirmation" name="password_confirmation"></p>
                    <p>Email: <input type="text" value="" placeholder="Email" name="email"></p>
                    <p>Email_verified: <input type="text" value="{{ $user->email_verified_at }}" placeholder="Email_ver" disabled></p>
                    <p>Last_active: <input type="text" value="{{ $user->last_active }}" placeholder="last_active" disabled></p>
                    <p>Phone: <input type="text" value="{{ $user->phone }}" placeholder="phone" name="phone"></p>
					<p>Newsletter:  
						<input type="checkbox" 
								value="1" 
								name="consent" 
								@if($user->newsletter->consent == 1) checked ? 0 @endif
						></p> 
                    <button type="submit">Edytuj!</button>
                </form> 
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
