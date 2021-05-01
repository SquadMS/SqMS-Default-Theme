@extends('squadms-default-theme::structure.layout', [
    'mainClass' => 'justify-content-center'
])

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1>{{ __('squadms-default-theme::pages/home.heading') }}</h1>
                <img src="https://squadms.com/img/logo.svg" alt="SquadMS Logo" class="img-fluid">
            </div>
        </div>
    </div>
</section>
@endsection