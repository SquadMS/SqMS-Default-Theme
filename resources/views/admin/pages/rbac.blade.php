@extends('squadms-default-theme::admin.structure.layout')

@section('content')
<section>
    <div class="container-fluid">
        <div class="row pb-4">
            <div class="col">
                <h1 class="d-flex aliign-items-center">
                    <span class="flex-grow-1">RBAC</span>
                    <livewire:sqms-default-theme.admin.rbac.create-role></livewire:admin.rbac.create-role/>
                </h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <livewire:sqms-default-theme.admin.rbac.role-list></livewire:admin.rbac.role-list/>
            </div>
        </div>
    </div>
</section>
@endsection