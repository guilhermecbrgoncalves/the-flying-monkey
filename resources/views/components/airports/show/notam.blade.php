<div class="container-fluid" id="notam" style="display: none">
    <div class="row" id="row-notams">
    </div>
</div>
</div>

<script language="JavaScript" type="text/javascript">
    let rowNotams = document.getElementById('row-notams')
    function getNotams(airport) {
    fetch(
        `https://applications.icao.int/dataservices/api/notams-realtime-list?api_key=7425709b-669a-4e49-bd21-72639da2bcba&format=json&criticality=&locations=${airport}`)
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
getNotams('LPPR');
</script>
