@extends('squadms-default-theme::structure.layout')

@section('content')
    <h1>Profile of {{ $user->name }} | {{ $user->steam_id_64 }}</h1>
@endsection