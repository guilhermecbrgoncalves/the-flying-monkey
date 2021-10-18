<div class="container-fluid mt-1" id="charts-maps" style="display: none">
    <p><b>Longitude:</b> {{$airport->latitude}}</p>
    <p><b>Latitude:</b> {{$airport->longitude}}</p>
    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div id="sv_8185" style="width: 100%; height: 500px;" class="bg-light border border-radius shadow">
                <script
                    src="//skyvector.com/api/lchart?ll={{$airport->latitude}},{{$airport->longitude}}&amp;s=4&amp;c=sv_8185&amp;i=301"
                    type="text/javascript"></script>
            </div>
        </div>
        <div class="col-md-9 col-sm-12">
            <div id="map" class="bg-light border border-radius shadow"></div>
        </div>
    </div>
</div>

<script>
    function initMap() {
  const myLatLng = { lat: {{$airport->latitude}}, lng: {{$airport->longitude}} };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: myLatLng,
    gestureHandling: "greedy",
  });

  new google.maps.Marker({
    position: myLatLng,
    map
  });
}
</script>
