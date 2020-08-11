@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Файл</th>
        </tr>
        </thead>
        <tbody>
        @foreach($docs as $doc)
            <tr>
                <td>{{ $doc->id }}</td>
                <td>{{ $doc->title }}</td>
                <td>{{ $doc->created_at }}</td>
                <td>
                    <a target="_blank" href="{{ asset('/storage/docs/'.$doc->file) }}">Просмотреть</a>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
@endsection
