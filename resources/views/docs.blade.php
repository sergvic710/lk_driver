@extends('layouts.app')

@section('content')

        @foreach($docs as $doc)
            <div class="card-doc card shadow-sm">
                <div class="card-body">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-3 d-none d-md-block">
                            Название
                        </div>
                        <div class="col-md-3 d-none d-md-block">
                            Дата создания
                        </div>
                        <div class="col-md-3 d-none d-md-block">
                            Дата просмотра
                        </div>
                        <div class="col-md-3 d-none d-md-block">
                            Файл
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="d-md-none d-block">
                                <b>Название</b>
                            </div>
                            {{ $doc->title }}
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="d-md-none d-block">
                                Дата создания
                            </div>
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $doc->created_at)
                    ->format('d-m-Y H:i') }}
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="d-md-none d-block">
                                Дата просмотра
                            </div>
                            <span class="view-doc-time" id="at-{{ $doc->id }}">
                            {{ !is_null($doc->view_at)?\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $doc->view_at)
                    ->format('d-m-Y H:i'):'' }}
                            </span>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="d-md-none d-block">
                                файл
                            </div>
                            <a target="_blank" class="view-doc-link" id="{{ $doc->id }}" href="{{ asset('/storage/docs/'.$doc->file) }}">Просмотреть</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
