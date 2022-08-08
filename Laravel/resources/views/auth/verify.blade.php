@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potwierdz swój Email!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Na Twojego Emaila Wlasnie Dolecial Link do Potwierdzenia!') }}
                        </div>
                    @endif

                    {{ __('Przed Kliknieciem sprawdz czy na pewno nie masz na Mailu Linka') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kliknij tutaj aby poprosic o nowy Link!') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
