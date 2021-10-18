@extends('components.master.main')

@section('content')
<div class="container mt-5">
    <div class="row pt-5 pb-5">
        <div class="col-md-7 col-sm-12 pr-5">

            <h1 class="page-title">Welcome<br>
                @if(Auth::check())
                <a href="{{url('users/' . auth()->user()->id)}}">
                    {{auth()->user()->name}}
                    @endif
            </h1> </a>
        </div>
        <div class="col-md-5 col-sm-6 pl-5 text-center">
            <img class="img-profile rounded-circle" style="width: 300px; height:300px; object-fit:cover"
                src="/storage/{{auth()->user()->avatar}}">
        </div>
    </div>
</div>
<div class="container">
    <h1 class="pt-5 pb-5 text-center">What do you want to do?</h1>
    <div class="row pb-5">
        <div class="col-md-4 col-sm-12 pt-2 text-center">
            <a href="{{route('world-map')}}">
                <h4>See World Map</h4>
            </a>
        </div>

        <div class="col-md-4 col-sm-12 pt-2 text-center">
            <a href="{{route('my-airports')}}">
                <h4>Check My Airports</h4>
            </a>
        </div>

        <div class="col-md-4 col-sm-12 pt-2 text-center">
            <a href="{{route('my-logbook')}}">
                <h4>Logbook</h4>
            </a>
        </div>
    </div>
</div>

@endsection
