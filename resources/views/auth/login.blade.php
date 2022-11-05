@extends('layouts.app')

@section('content')

<section class="flat-account background">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-login">
                    <div class="title">
                        <h3>Login</h3>
                    </div>
                    <form id="form-login" method="POST" action="{{ url('login') }}" data-toggle="validator">
                        @csrf
                        <input type="hidden" name="loginform" value="1">
                        <div class="form-box form-group">
                            <label for="name-login">Email Address <span class="help-block">*</span> </label>
                            <!-- <input type="text" id="name-login" name="name-login" placeholder="Ali"> -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <div class="help-block with-errors"></div>
                            @if($errors->has('email') && old('loginform'))
                            <span class="invalid-feedback" role="alert">
                                <p class="help-block">{{ $errors->first('email') }}</p>
                            </span>
                            @endif
                        </div><!-- /.form-box -->
                        <div class="form-box form-group">
                            <label for="password-login">Password <span class="help-block">*</span> </label>
                            <!-- <input type="text" id="password-login" name="password-login" placeholder="******"> -->
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="help-block with-errors"></div>
                            @if($errors->has('password') && old('loginform'))
                                <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                </span>
                            @enderror
                        </div><!-- /.form-box -->
                        <div class="form-box checkbox">
                            <!-- <input type="checkbox" id="remember" checked name="remember"> -->
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">Remember me</label>
                        </div><!-- /.form-box -->
                        <div class="form-box">
                            <button type="submit" class="login">Login</button>
                            <!-- <a href="#" title="">Lost your password?</a> -->
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('forget.password.get') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        </div><!-- /.form-box -->
                    </form><!-- /#form-login -->
                </div><!-- /.form-login -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="form-register" style="height:629px !important">
                    <div class="title">
                        <h3>Register</h3>
                    </div>
                    <!-- <form action="#" method="get" id="form-register" accept-charset="utf-8"> -->
                    <form id="form-register" method="POST" action="{{ url('register') }}" data-toggle="validator">
                        @csrf
                        <div class="form-box form-group">
                            <label for="name-register">Email Address <span class="help-block">*</span> </label>
                            <!-- <input type="text" id="name-register" name="name-register">-->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <div class="help-block with-errors"></div>
                            @if($errors->has('email') && !old('loginform'))
                                <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('email') }}</p>
                                </span>
                            @endif
                        </div><!-- /.form-box -->
                        <div class="form-box form-group">
                            <label for="password-register">Password <span class="help-block">*</span></label>
                            <!-- <input type="text" id="password-register" name="password-register"> -->
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <div class="help-block with-errors"></div>
                            @if($errors->has('password') && !old('loginform'))
                                <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                </span>
                            @endif
                        </div><!-- /.form-box -->
                        <div class="form-box form-group">
                            <label for="name-register">Address <span class="help-block">*</span> </label>
                            <!-- <input type="text" id="name-register" name="name-register">-->
                            <input id="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="email">
                            <div class="help-block with-errors"></div>
                            @if($errors->has('address') && !old('loginform'))
                                <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('address') }}</p>
                                </span>
                            @endif
                        </div>
                        {!! captcha_image_html('RegisterCaptcha') !!}
                        <input type="text"id="CaptchaCode" name="CaptchaCode" placeholder=""  class="form-control  @error('CaptchaCode') is-invalid @enderror"  required autocomplete="CaptchaCode">
                        <div class="help-block with-errors"></div>
                        @if($errors->has('CaptchaCode') && !old('loginform'))
                            <span class="invalid-feedback" role="alert">
                                    <p class="help-block">{{ $errors->first('CaptchaCode') }}</p>
                                </span>
                        @endif
                        <div class="form-box">
                            <button type="submit" class="register">Register</button>
                        </div><!-- /.form-box -->
                    </form><!-- /#form-register -->
                </div><!-- /.form-register -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-account -->

<section class="flat-row flat-iconbox style1 background">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="iconbox style1 v1">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{asset('front_assets/images/icons/car.png')}}" alt="">
                        </div>
                        <div class="box-title">
                            <h3>Worldwide Shipping</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.box-header -->
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-6 col-lg-3 -->
            <div class="col-md-6 col-lg-3">
                <div class="iconbox style1 v1">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{asset('front_assets/images/icons/order.png')}}" alt="">
                        </div>
                        <div class="box-title">
                            <h3>Order Online Service</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.box-header -->
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-6 col-lg-3 -->
            <div class="col-md-6 col-lg-3">
                <div class="iconbox style1 v1">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{asset('front_assets/images/icons/payment.png')}}" alt="">
                        </div>
                        <div class="box-title">
                            <h3>Payment</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.box-header -->
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-6 col-lg-3 -->
            <div class="col-md-6 col-lg-3">
                <div class="iconbox style1 v1">
                    <div class="box-header">
                        <div class="image">
                            <img src="{{asset('front_assets/images/icons/return.png')}}" alt="">
                        </div>
                        <div class="box-title">
                            <h3>Return 30 Days</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.box-header -->
                </div><!-- /.iconbox -->
            </div><!-- /.col-md-6 col-lg-3 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-iconbox -->
@endsection
