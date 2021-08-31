<div class="container text-center p-3">
    <h4 class="text-left"><span id="airport-name"></span><span id="airport-code"></span></h4>
    <br>
    <h5 class="text-left"><span id="airport-city"></span><span id="airport-country"></span></h5>
    <form method="POST" action="{{route('my-airports-store')}}">
        @csrf
        <input type="text" id="name" name="name" hidden>
        <input type="text" id="code" name="code" hidden>
        <input type="text" id="city" name="city" hidden>
        <input type="text" id="country" name="country" hidden>
        <input type="text" id="latitude" name="latitude" hidden>
        <input type="text" id="longitude" name="longitude" hidden>
        <button class="btn btn-primary mt-4 mx-auto" id="add-airport-btn" type="submit">add to my airports</button>
    </form>
</div>