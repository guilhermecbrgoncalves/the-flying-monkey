<div class="container-fluid">
    <form method="POST" action="{{route('logbook-store')}}">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" id="date" name="date" class="form-control
                    @error('name') is-invalid @enderror" value="{{ old('date') }}" required
                        aria-describedby="dateHelp">
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="aircraft">aircraft registration</label>
                    <input type="text" id="aircraft" name="aircraft"
                        autocomplete="aircraft registration" placeholder="type the aircraft registration" class="form-control
                    @error('aircraft') is-invalid @enderror" value="{{ old('aircraft') }}"
                        required aria-describedby="aircraft-registration-help">
                    @error('aircraft')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="departure_time">departure time</label>
                    <input type="time" id="departure_time" name="departure_time" class="form-control
                    @error('departure_time') is-invalid @enderror" value="{{ old('departure_time') }}" required
                        aria-describedby="departure-time-help">
                    @error('departure_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="departure_place">departure place</label>
                    <input type="text" id="departure_place" name="departure_place" autocomplete="departure place"
                        placeholder="type the departure place" class="form-control
                    @error('departure_place') is-invalid @enderror" value="{{ old('departure_place') }}" required
                        aria-describedby="departure_place-help">
                    @error('departure_place')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="arrival_time">arrival time</label>
                    <input type="time" onkeyup="timeValidation(), flightTime()" id="arrival_time" name="arrival_time" class="form-control
                    @error('arrival_time') is-invalid @enderror" value="{{ old('arrival_time') }}" required
                        aria-describedby="arrival-time-help">
                    @error('arrival_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="arrival_place">arrival place</label>
                    <input type="text" id="arrival_place" name="arrival_place" autocomplete="arrival place"
                        placeholder="type the arrival place" class="form-control
                    @error('arrival_place') is-invalid @enderror" value="{{ old('arrival_place') }}" required
                        aria-describedby="arrival_place-help">
                    @error('arrival_place')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="take_offs">take offs</label>
                    <input type="number" id="take_offs" name="take_offs" class="form-control
                    @error('take_offs') is-invalid @enderror" value="{{ old('take_offs') }}" required
                        aria-describedby="take_offs-help">
                    @error('take_offs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_flight_time">flight time</label>
                    <input type="time" id="total_flight_time" name="total_flight_time" class="form-control
                    @error('total_flight_time') is-invalid @enderror" value="{{ old('total_flight_time') }}" required
                        aria-describedby="total_flight_time-help">
                    @error('total_flight_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="landings">landings</label>
                    <input type="number" id="landings" name="landings" class="form-control
                    @error('landings') is-invalid @enderror" value="{{ old('landings') }}" required
                        aria-describedby="landings-help">
                    @error('landings')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <label for="type_of_flight">type of flight</label>
                    <select class="form-control" name="type_of_flight" id="type_of_flight">
                        <option value="VFR">VFR</option>
                        <option value="IFR">IFR</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="notes">notes</label>
                    <textarea rows="4" type="text" id="notes" name="notes" autocomplete="notes"
                        placeholder="type some notes" class="form-control
                    @error('notes') is-invalid @enderror" value="{{ old('notes') }}" required
                        aria-describedby="notes-help"></textarea>
                    @error('notes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
</div>