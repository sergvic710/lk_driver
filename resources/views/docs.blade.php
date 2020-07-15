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
                <td>{{ $doc->title }}</td>
                <td><img src="{{ asset('upload/'.$doc->file) }}"> </td>
            </tr>
    @endforeach
        </tbody>
    </table>
@endsection
