@extends('components.master.main')

@section('content')
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <div class="col">
            <h1 class="page-title">my logbook</h1>
        </div>
        <div class="col text-center">
            @component('components.logbook.sessions')
            @endcomponent
        </div>
        <div class="col text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">new entry</button>
        </div>
    </div>
    @component('components.logbook.logbook-table', ['logbooks' => $logbooks])
    @endcomponent
</div>

@component('components.logbook.add.modal')
@endcomponent

@endsection