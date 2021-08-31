@if(session('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@elseif(session('airport-created-message'))
<div class="alert alert-success">{{session('airport-created-message')}}</div>
@elseif(session('airport-deleted-message'))
<div class="alert alert-danger">{{session('airport-deleted-message')}}</div>
@endif