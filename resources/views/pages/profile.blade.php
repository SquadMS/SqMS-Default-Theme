@extends('squadms-default-theme::structure.layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Profile of {{ $user->name }} | {{ $user->steam_id_64 }}</h1>
            </div>
        </div>
    </div>
</section>
@endsection