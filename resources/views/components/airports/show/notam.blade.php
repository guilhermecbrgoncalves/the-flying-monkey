<div class="container-fluid" id="notam" style="display: none">
    <div class="row" id="row-notams">
        <div class="col-6 mt-2">
            <div class='accordion' id='accordion-1'>
                <div class='card'>
                    <div class='card-header' id='heading-1'>
                        <h2 class='mb-0'><button class='btn btn-link btn-block text-left' type='button'
                                data-toggle='collapse' data-target='#collapse-1' aria-expanded='fase'
                                aria-controls='collapse-1'>
                                <b>Issued:</b> 16 JUN 2021 04:19 <br> <b>From:</b> 31 JUL 2021 22:23 <br> <b>To:</b> 31
                                OCT 2021 23:59 EST</button></h2>
                    </div>
                    <div id='collapse-1' class='collapse' aria-labelledby='heading-1' data-parent='#accordion-1'>
                        <div class='card-body'>
                            <p>RWY 21 NEW RAPID EXIT TAXIWAY 1600 METERS FROM THR NOT AVAILABLE YET. FIRST RAPID EXIT
                                TAXIWAY AVAILABLE IS HS, 1910 METERS FROM THR.
                           </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="col-6 mt-2">

        <div class='accordion' id='accordion-2'>
            <div class='card'>
                <div class='card-header' id='heading-2'>
                    <h2 class='mb-0'><button class='btn btn-link btn-block text-left' type='button'
                            data-toggle='collapse' data-target='#collapse-2' aria-expanded='fase'
                            aria-controls='collapse-2'>
                            <b>Issued:</b> 15 OCT 2021 15:16 <br> <b>From:</b> 18 OCT 2021 15:16 <br> <b>To:</b> 21 DEC 2021 23:59</button></h2>
                </div>
                <div id='collapse-2' class='collapse' aria-labelledby='heading-2' data-parent='#accordion-2'>
                    <div class='card-body'>
                        <p>AIRCRAFT PARKING AND INFORMATION SYSTEM (APIS) ON STAND 425 OUT OF SERVICE. MARSHALLER ON SITE FOR ACFT PARKING PROCEDURES.
                           </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-6 mt-2">
    <div class='accordion' id='accordion-3'>
        <div class='card'>
            <div class='card-header' id='heading-3'>
                <h2 class='mb-0'><button class='btn btn-link btn-block text-left' type='button' data-toggle='collapse'
                        data-target='#collapse-3' aria-expanded='fase' aria-controls='collapse-3'>
                        <b>Issued:</b> 20 SEP 2021 16:44 <br> <b>From:</b> 29 SEP 2021 16:44 <br> <b>To:</b> 31 DEC 2021 20:21 EST
                        </button></h2>
            </div>
            <div id='collapse-3' class='collapse' aria-labelledby='heading-3' data-parent='#accordion-3'>
                <div class='card-body'>
                    <p>
                        LPPT AD - TWY K CLSD. NEW END OF VALIDITY UFN. REF AIP SUP 039/2020.
                        </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<script language="JavaScript" type="text/javascript">
    let rowNotams = document.getElementById('row-notams')

    function getNotams(airport) {
        console.log("hello");
    fetch(
        `https://applications.icao.int/dataservices/api/notams-realtime-list?api_key=d4133704-abc5-45dd-8b28-0d87f8258c89&format=json&criticality=&locations=${airport}`)
        .then(response => {

            return response.json();
        })
        .then(data => {
            console.log(data)
            for(let i=0; i<data.length; i++) {
                let col = document.createElement('div');
                let dateIssued = new Date(data[i].Created);
                let dateFrom = new Date(data[i].startdate);
                let dateTo = new Date(data[i].enddate);

            col.className = "col-md-6 col-sm-12 mt-3";
            col.innerHTML = `<div class='accordion' id='accordion-${i}'><div class='card'><div class='card-header' id='heading-${i}'><h2 class='mb-0'><button class='btn btn-link btn-block text-left' type='button' data-toggle='collapse' data-target='#collapse-${i}' aria-expanded='fase' aria-controls='collapse-${i}'><b>Issued:</b> ${dateIssued.toUTCString()} <br> <b>From:</b> ${dateFrom.toUTCString()} <br> <b>To:</b> ${dateTo.toUTCString()}</button></h2></div><div id='collapse-${i}' class='collapse' aria-labelledby='heading-${i}'data-parent='#accordion-${i}'><div class='card-body'><p>${data[i].message}</p></div></div></div></div></div></div>` ;

        rowNotams.appendChild(col);
            }
        })
    }
getNotams('{{$airport->code}}');
</script>
