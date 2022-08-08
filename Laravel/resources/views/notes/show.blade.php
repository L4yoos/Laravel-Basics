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
                {!! Form::open( [ 'route' => [ 'panel.notes.update', $note ], 'method' => 'put', 'class' => 'form-horizontal' ] ) !!}
                <div class="form-group">
					{{ Form::label( 'id', 'ID', [ 'class' => 'col-sm-3 control-label' ] ) }}
					<div class="col-sm-9">
						{{ Form::text( 'id', $note->id, null, [ 'class' => 'form-control' ]) }}
					</div>
			    </div>
                <div class="form-group">
					{{ Form::label( 'user_id', 'USER_ID', [ 'class' => 'col-sm-3 control-label' ] ) }}
					<div class="col-sm-9">
						{{ Form::text( 'user_id', $note->user_id, null, [ 'class' => 'form-control' ]) }}
					</div>
			    </div>
                <div class="form-group">
					{{ Form::label( 'topic', 'TOPIC', [ 'class' => 'col-sm-3 control-label' ] ) }}
					<div class="col-sm-9">
						{{ Form::text( 'topic', $note->topic, null, [ 'class' => 'form-control' ]) }}
					</div>
			    </div>
                <div class="form-group">
					{{ Form::label( 'text', 'TEXT', [ 'class' => 'col-sm-3 control-label' ] ) }}
					<div class="col-sm-9">
						{{ Form::text( 'text', $note->text, null, [ 'class' => 'form-control' ]) }}
					</div>
			    </div>
                <button type="submit">Edytuj!</button>
                {{ form::close() }}
            </div>
            </div>
        </div>
    </div>
</div>  
@include('_parts/scripts')  
@endsection
