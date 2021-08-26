<div class="container-fluid bg-light border-radius p-3 shadow">
    <form method="post" action="{{url('users/' . $user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="username" class="font-weight-bold">username</label>
                    <input type="text" name="username" class="form-control" id="username"
                        value="{{$user->username}}">
                    @error('username')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Email" class="font-weight-bold">e-mail</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Password" class="font-weight-bold">password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="font-weight-bold">confirm password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        id="password_confirmation">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-6 col-12 text-center my-auto p-2">
                <img class="img-profile rounded-circle border mb-3" src="/storage/{{$user->avatar}}">
                <div class="form-group">
                    <input type="file" name="avatar">
                </div>
            </div>
        </div>
<div class="row">
    <div class="col">
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3">submit</button>
        </div>
    </div>
    <div class="col">
        <div class="text-right">
            <button class="btn btn-danger mt-3" type="button" data-toggle="modal" data-target="#deleteUserModal">delete user</button>
        </div>
    </div>
    </div>
    </form>
</div>
