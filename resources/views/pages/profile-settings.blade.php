@extends('sqms-default-theme::structure.layout')

@section('content')
<section class="mt-6">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ __('sqms-default-theme::pages/profile-settings.heading', ['name' => $user->name . '('. $user->steam_id_64 . ')']) }}</h1>
            </div>
        </div>

        @if (config('session.driver') === 'database')
        <div class="row">
            @foreach ($user->getRunningSessions() as $session)
                <div class="d-flex">
                    <div>
                        @if ($session->agent->isDesktop())
                            <svg fill="none" width="32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="text-muted">
                                <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="text-muted">
                                <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                            </svg>
                        @endif
                    </div>

                    <div class="ml-2">
                        <div>
                            {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                        </div>

                        <div>
                            <div class="small font-weight-lighter text-muted">
                                {{ $session->ip_address }},

                                @if ($session->is_current_device)
                                    <span class="text-success font-weight-bold">{{ __('This device') }}</span>
                                @else
                                    {{ __('Last active') }} {{ $session->last_active }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        @if ($user->id === Auth::user()->id)
        <div class="row">
            <div class="col">
                <form action="{{ route(Config::get('sqms.routes.def.logoutOtherDevices.name')) }}" method="POST">
                    {{ csrf() }}

                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword">
                        @error('password') 
                            <div id="validation" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">Log out other devices</button>
                </form>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection