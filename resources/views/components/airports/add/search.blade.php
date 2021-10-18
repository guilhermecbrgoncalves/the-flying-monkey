<div class="container text-center">
    <div class="form-group">
        <label for="arrival_place">Search Airport by ICAO or IATA Code</label>
        <div class="container mt-3">
            <div class="row mb-4">
                <div class="col-8">
                    <input type="text" id="airport-input" name="airport-input" width="80%"
                        placeholder="Please type the airport code" class="form-control">
                </div>
                <div class="col">
                    <button class="btn btn-primary" onclick="searchAirport()">Search</button>
                </div>
            </div>
            <p>Not sure about the code? <a href="{{route('world-map')}}">Click here to check the world map!</a></p>
        </div>
        <div class="alert alert-danger" id="airport-not-found" style="display: none">Airport Code not recognized</div>
    </div>
</div>
