@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Дата просмотра</th>
            <th scope="col">Файл</th>
        </tr>
        </thead>
        <tbody>
        @foreach($docs as $doc)
            <tr>
                <td>{{ $doc->id }}</td>
                <td>{{ $doc->title }}</td>
                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $doc->created_at)
                    ->format('d-m-Y H:i') }}</td>
                <td class="view-doc-time" id="at-{{ $doc->id }}">{{ !is_null($doc->view_at)?\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $doc->view_at)
                    ->format('d-m-Y H:i'):'' }}</td>
                <td>
                    <a target="_blank" class="view-doc-link" id="{{ $doc->id }}" href="{{ asset('/storage/docs/'.$doc->file) }}">Просмотреть</a>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
@endsection
