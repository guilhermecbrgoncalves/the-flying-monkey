@if(session('profile-updated-message'))
<div class="alert alert-success">{{session('profile-updated-message')}}</div>
@elseif(session('user-deleted'))
<div class="alert alert-success">{{session('user-deleted')}}</div>
@endif