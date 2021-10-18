<div class="container-fluid">
    <div class="row">
        @foreach ($airports as $airport)
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="container-fluid bg-light border-radius shadow" id="container-{{$airport->code}}"
                style="background-size: cover;">
                <div class="row p-3 border-radius text-light"
                    style="background-color: rgba(0, 0, 0, 0.582); height: 100%">
                    <div class="col airport-info">
                        <h2>{{$airport->name}}</h2>
                        <h4>{{$airport->city}}, {{$airport->country}}</h4>
                        <h1><span id="current-temperature-{{$airport->code}}"></span>ºC</h1>
                        <h5><span id="current-description-{{$airport->code}}"></span></h5>
                        <hr>
                        <p><i class="fas fa-cloud"></i> <span id="current-clouds-{{$airport->code}}"></span>%<i
                                class="fas fa-eye ml-4"></i> <span
                                id="current-visibility-{{$airport->code}}"></span><span
                                id="current-visibility-m-{{$airport->code}}"></span></p>
                        <hr>
                        <p><i class="fas fa-compass"></i> <span id="current-wind-direction-{{$airport->code}}"></span>º
                            <i class="fas fa-wind ml-4"></i><span id="current-wind-speed-{{$airport->code}}"
                                class="ml-2"></span>kts</p>
                        <hr>
                    </div>
                    <div class="col">
                        <div class="text-right">
                            <form action="{{route('my-airports-delete', $airport->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">x</button>
                            </form>
                        </div>
                        <br>
                        <div class="text-center my-auto mx-auto">
                            <img style="width: 110px" id="weather-icon-{{$airport->code}}" src="">
                        </div>
                        <br>
                        <div class="text-right">
                            <a class="btn btn-primary" href="{{route('my-airport-show', $airport->id)}}">see more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
