@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Shopping') }}</div>
				<table>
					<thead>
						<tr>
							<th>Cena:</th>
							<th>Nazwa:</th>
                            <th>Ilość:</th>
							<th>Opcje:</th>
						</tr>
					</thead>
					<tbody>
						@foreach($shoptools as $shoptool)
						<tr>
							<th>{{ $shoptool->price }}zł</th>
							<th>{{ $shoptool->name }}</th>
							<th>{{ $shoptool->quantity }}</th>
							<th>
								<form action="{{ route('panel.shopping.buy',  $shoptool) }}" method="POST">@method('PUT') @csrf
								<input type="number" name="quantity" placeholder="Podaj ilość"><button type="submit">Zakup!</button>
								</form>
							</th>
							@endforeach
						</tr>
					</tbody>
				</table>
                </div>
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
