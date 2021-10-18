@if(session('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@elseif(session('airport-created-message'))
<div class="alert alert-success">{{session('airport-created-message')}}</div>
@elseif(session('airport-duplicate-message'))
<div class="alert alert-danger">{{session('airport-duplicate-message')}}</div>
@elseif(session('airport-deleted-message'))
<div class="alert alert-success">{{session('airport-deleted-message')}}</div>
@elseif($errors->has('name'))
<div class="alert alert-danger">Airport already on the list</div>
@endif
