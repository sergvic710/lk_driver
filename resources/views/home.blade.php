@extends('layouts.app')

@section('content')
    <div class="card">
    <!--<div class="card-header">{{ __('Dashboard') }}</div>-->

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if( $lastLogin == '')
                Вы зашли в первый раз
                    Вы можете сменить свой пароль по этой <a href="{{ route('change.password') }}">ссылке</a>
            @endif
            @if ( $lastLogin != '' )
                В последний раз Вы заходили {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lastLogin)
                            ->format('d-m-Y H:i') }}
            @endif
        </div>
    </div>
@endsection
