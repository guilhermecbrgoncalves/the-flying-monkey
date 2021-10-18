@extends('components.master.main')
@section('content')
<div class="container-fluid sub-bg mt-4 pt-5 pb-2 mb-5">
    <div class="row">
        <div class="col-md-3 col-sm-12">

            <h1 class="page-title text-muted">{{$airport->name}}</h1>
        </div>
        <div class="col-md-5 col-sm-12 my-auto">
            <div class="container text-center">
                <button class="btn btn-primary" id="btn-meteorology"
                    onclick="visibility('meteorology', 'notam', 'charts-maps', 'btn-meteorology', 'btn-notam', 'btn-charts-maps')">meteorology</button>
                <button class="btn btn-light" id="btn-notam"
                    onclick="visibility('notam', 'meteorology', 'charts-maps', 'btn-notam', 'btn-meteorology', 'btn-charts-maps' )">notam</button>
                <button class="btn btn-light" id="btn-charts-maps"
                    onclick="visibility('charts-maps', 'meteorology', 'notam', 'btn-charts-maps', 'btn-notam', 'btn-meteorology')">charts
                    & maps</button>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 my-auto">
            <h1 class="card-title text-right" style="font-size: 36px" id="section-title">meteorology</h1>
        </div>
    </div>
</div>

@component('components.airports.show.meteorology', ['airport' => $airport, 'windyKey' => $windyKey])
@endcomponent

@component('components.airports.show.notam', ['airport' => $airport])
@endcomponent

@component('components.airports.show.charts-maps', ['airport' => $airport])
@endcomponent


@endsection
