@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                <a href="{{ route('panel.notes.create') }}">SD</a>
                <table>
                    <thead>
                        <tr>
							<th>ID:</th>
							<th>User_ID:</th>
                            <th>Topic:</th>
							<th>Text:</th>
						</tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $note)
                        <tr>
							<td><a href="{{ route('panel.notes.show',$note->id) }}">{{ $note->id }}</a></td>
							<td>{{ $note->user_id }}</td>
                            <td>{{ $note->topic }}</td>
							<td>{{ $note->text }}</td>
                            <td>
                                <form method="POST" action="{{ route('panel.notes.destroy', $note->id) }}" >@csrf @method('delete')
                                    <button type="submit">Wyjeb element</button>                
                                </form>
                        </td>
                        @endforeach
                        </tr>
                    </tbody>                   
                </table>
            </div>
            </div>
        </div>
    </div>
</div>   
@include('_parts/scripts') 
@endsection
