@extends('templates.main')
@section('main')
    <h1>Hello, world</h1>
    <p>{{auth()->id()}}</p>
@endsection

