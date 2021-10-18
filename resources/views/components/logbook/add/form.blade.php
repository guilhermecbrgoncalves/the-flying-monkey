<div class="container-fluid">
    <form method="POST" action="{{route('logbook-store')}}">
        @csrf
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="date">date</label>
                    <input type="date" id="date" name="date" class="form-control">
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="aircraft">aircraft registration</label>
                    <input type="text" id="aircraft" name="aircraft" autocomplete="aircraft registration"
                        placeholder="type the aircraft registration" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="departure_time">departure time</label>
                    <input type="time" id="departure_time" onfocusout="timeValidation()" name="departure_time"
                        class="form-control">
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="departure_place">departure place</label>
                    <input type="text" id="departure_place" name="departure_place" autocomplete="departure place"
                        placeholder="type the departure place" class="form-control">
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="arrival_time">arrival time</label>
                    <input type="time" min="" onfocusout="timeValidation()" id="arrival_time" name="arrival_time"
                        class="form-control">
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="arrival_place">arrival place</label>
                    <input type="text" id="arrival_place" name="arrival_place" autocomplete="arrival place"
                        placeholder="type the arrival place" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="take_offs">take offs</label>
                    <input type="number" id="take_offs" name="take_offs" class="form-control">
                </div>
            </div>
            <div class="col-xl-3 col-md-3 col-sm-6 col-6">
                <div class="form-group">
                    <label for="landings">landings</label>
                    <input type="number" id="landings" name="landings" class="form-control">
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
                        placeholder="type some notes" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>