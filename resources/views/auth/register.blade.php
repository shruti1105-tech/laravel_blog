@extends('user/app')

@section('bg-img',asset('user/img/contact-bg.jpg'))

@section('title','Register Here')

@section('sub-heading','')

@section('main-content')


    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">First Name</label>
                                            <input id="name" type="text" class="form-control py-4" name="name" value="{{ old('name') }}" placeholder="Enter first name" required autofocus/>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                             <strong>{{ $errors->first('name') }}</strong>
                                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input id="email" type="email" class="form-control py-4" name="email" value="{{ old('email') }}" placeholder="Enter email address" required/>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                    @endif
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input id="password" type="password" class="form-control py-4" name="password" placeholder="Enter password" required/>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control py-4" name="password_confirmation" placeholder="Confirm password" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>

@endsection

