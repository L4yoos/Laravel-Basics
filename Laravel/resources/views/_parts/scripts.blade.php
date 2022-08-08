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