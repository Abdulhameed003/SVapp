@extends('layouts.app')

@section('content')
<div class "container" ng-app="myApp" ng-controller="mainCtrl">   
    <div  id="loginleftbox" >
        <img   class="img-responsive" src="image/loginback1.jpg" />
    </div>

    <div class="box" style="left: 68%; top: 15%;">
        <div>
        <img  id="loginlogo" src="image/logo-salesvision (2).png" />
        </div>
        <div class="pagetitle">Login</div>
        <form>
            <div class="formcontent">
                <div class="form-group">
                    <input type="email" ng-model="Username" class="form-control registertext" placeholder="Email" />
                </div>
                <div class="form-group">
                    <input type="password" ng-model="password" class="form-control registertext" placeholder="Password">
                </div>

                <div class="form-group">
                    <input type="text" ng-model="companyID" class="form-control registertext" placeholder="Company Id">
                </div>

            </div>
            <div class="form-group">
                <button type="submit" ng-model="login" class="button register">Sign In</button>
                <div>
                    <button type="button" ng-click="open('sm')" class="btn btn-link" id="forget-pass">Forgot your Password?</button>

                    <a href="RegisterPage.html" target="blank">
                        <button type="button" class="btn btn-link" id="sign-up">Register</button>
                    </a>
                </div>
            </div>


        </form>
    </div>
</div>
<!--div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('log_in.submit') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                            <label for="company_id" class="col-md-4 control-label">Company ID</label>

                            <div class="col-md-6">
                                <input id="company_id" type="text" class="form-control" name="company_id" value="{{ old('company_id') }}" required autofocus>

                                @if ($errors->has('company_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
