@extends('components.master.main')

@section('content')
<div class="container-fluid mt-4 pt-5 pb-2 mb-5 sub-bg">
    <div class="row">
        <div class="col">
            <h1 class="page-title text-muted">my logbook</h1>
        </div>
        <div class="col text-center">
            @component('components.logbook.sessions')
            @endcomponent
        </div>
        <div class="col text-right my-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">new entry</button>
        </div>
    </div>
</div>
<div class="container-fluid">
    @component('components.logbook.logbook-table', ['logbooks' => $logbooks])
    @endcomponent
</div>

@component('components.logbook.add.modal')
@endcomponent

@endsection
