@extends('template.app')

@section('content')
    <div class="container-fluid content-index">
        <h3>Register</h3>
        <form style="max-width: 400px; margin: 0 auto;" class="form-group" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus />
            </div>
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required />
            </div>
            <div class="form-group">
                <label for="password" class="col-md-4 control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required />
                </div>
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required />
            </div>
                <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

@endsection
