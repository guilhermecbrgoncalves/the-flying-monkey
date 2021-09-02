@extends('components.master.main')
@section('content')
<div class="container mt-5 pt-5 text-center">
<h5>{{$airport->name}}</h5>
<button class="btn btn-primary">meteorology</button>
<button class="btn btn-light">notam</button>
<button class="btn btn-light">charts & maps</button>
</div>
<hr>

@component('components.airports.show.meteorology', ['airport' => $airport])
@endcomponent

@endsection