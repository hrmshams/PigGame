@extends('layouts.main')

@section ('bodyContent')
    <ul class="list-group">
    @foreach ($lists as $item)
        <li class="list-group-item">
            {{$item}}
        </li>
    @endforeach
    </ul>
@endsection