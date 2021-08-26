@if(session('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@elseif(session('logbook-created-message'))
<div class="alert alert-success">{{session('logbook-created-message')}}</div>
@elseif(session('logbook-updated-message'))
<div class="alert alert-success">{{session('logbook-updated-message')}}</div>
@elseif(session('logbook-deleted-message'))
<div class="alert alert-danger">{{session('logbook-deleted-message')}}</div>
@endif