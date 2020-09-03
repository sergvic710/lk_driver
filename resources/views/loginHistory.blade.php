@extends('layouts.app')

@section('content')
    @foreach($history as $h)
        <div class="row">
            <div class="col-12">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $h->login_at)
                    ->format('d-m-Y H:i') }}
            </div>
        </div>
    @endforeach
@endsection
