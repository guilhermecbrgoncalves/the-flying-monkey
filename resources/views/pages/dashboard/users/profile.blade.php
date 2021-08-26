@extends('components.master.main')
@section('content')
<div class="container-fluid mt-5 mb-5 pt-5">
    <div class="row">
        <div class="col">
            <h1 class="page-title">my profile</h1>
        </div>
        <div class="col text-center">
            @component('components.users.sessions')
            @endcomponent
        </div>
        <div class="col"></div>
    </div>
    @component('components.users.form', ['user' => $user])
    @endcomponent
</div>
@component('components.users.delete-modal')
@endcomponent
@endsection