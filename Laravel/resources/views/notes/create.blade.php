@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                Notes page - coming soon.
                {!! Form::open( [ 'route' => [ 'panel.notes.store' ], 'method' => 'post', 'class' => 'form-horizontal' ] ) !!}
                <div class="form-group">
					{{ Form::label( 'topic', 'TOPIC', [ 'class' => 'col-sm-3 control-label' ] ) }}
					<div class="col-sm-9">
						{{ Form::text( 'topic', null, null, [ 'class' => 'form-control' ]) }}
					</div>
			    </div>
                <div class="form-group">
					{{ Form::label( 'text', 'TEXT', [ 'class' => 'col-sm-3 control-label' ] ) }}
					<div class="col-sm-9">
						{{ Form::text( 'text', null, null, [ 'class' => 'form-control' ]) }}
					</div>
			    </div>
                <button type="submit">Utwórz!</button>
                {{ form::close() }}
            </div>
            </div>
        </div>
    </div>
</div>  
@include('_parts/scripts')  
@endsection
