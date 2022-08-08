@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @php
                    //dd($user->newsletter->latest()->first()->consent);
                @endphp
                <form action=" {{ route('panel.user.update', $user) }} " method="POST">@method('put')
                @csrf
                
                    <p>ID: <input type="text" value="{{ $user->id }}" placeholder="ID" disabled></p>
                    <p>Name: <input type="text" value="{{ $user->name }}" placeholder="Name" name="name"></p>
                    <p>Password: <input type="text" value="" placeholder="password" name="password"></p>
                    <p>Password confirmed: <input type="text" value="" placeholder="password_confirmation" name="password_confirmation"></p>
                    <p>Email: <input type="text" value="" placeholder="Email" name="email"></p>
                    <p>email_verified: <input type="text" value="{{ $user->email_verified_at }}" placeholder="Email_ver" disabled></p>
                    <p>Is_admin: <input type="text" value="{{ $user->is_admin }}" placeholder="is_admin" name="is_admin"></p>
                    <p>Last_active: <input type="text" value="{{ $user->last_active }}" placeholder="last_active" disabled></p>
                    <p>Phone: <input type="text" value="{{ $user->phone }}" placeholder="phone" name="phone"></p>
					<p>Newsletter: 

						<input type="checkbox" value="1" name="consent">
                        @if ($user->newsletter->latest()->first()->consent == 1) checked @endif
                    </p> 
                    <button type="submit">Edytuj!</button>
                </form> 
            </div>
        </div>
    </div>
</div>
@include('_parts/scripts')
@endsection
