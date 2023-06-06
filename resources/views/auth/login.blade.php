@extends('webview.master-login')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Login
@endsection
<style>
    .body-content{
        padding-top: 72px; 
        height: 100vh; 
    }
    
    @media only screen and (max-width: 600px) {
        .body-content{
            padding-top: 120px; 
            height: 100vh; 
        }
    }
    input{
        
    border: none !important;
    border-bottom: 2px solid !important;

    }
    inputxx{
        border: none !important;
        box-shadow:1px 1px 30px 4px rgb(86 86 86 / 20%) !important;
    }
    #fbicon{
        border-radius: 50%;
        font-size: 22px;
        height: 40px;
        margin-right: 10px;
    }
    #ticon{
        border-radius: 50%;
        font-size: 19px; 
    }
</style>


<div class="body-content my-auto">
    <div class="container">
        <div class="m-b-10">
            <div class="row" style="margin:auto">
                <!-- create a new account -->
                <div class="col-md-4 col-sm-3 create-new-account">

                </div>
                
                <!-- Sign-in -->
                <div class="sign-in-page col-md-4 col-sm-4 sign-in m-auto" style="border-radius: 4px;">
                    <h4 class="" style="text-align: center;font-size: 30px;font-weight:bold;color: #0f6cb2;">Sign in</h4> 

                    <form class="register-form outer-top-xs" method="POST" action="{{ url('login') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group"> 
                            <input type="text" name="email" class="form-control unicase-form-control text-input" placeholder="User Name"
                                id="exampleInputEmail1">
                        </div>
                        <div class="form-group"> 
                            <input type="password" name="password" class="form-control unicase-form-control text-input" placeholder="Password"
                                id="exampleInputPassword1">
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember
                                me!
                            </label>
                            <a href="{{url('forgot-password')}}" class="forgot-password pull-right">Forgot your Password?</a>
                        </div>
                        <button type="submit"
                            class="btn-upper btn-block btn btn-primary checkout-page-button mb-4">SIGN IN</button>
                    </form>
                    <h4 class="text-center" style="margin-top: 20px;margin-bottom:20px;">
                        Need an account? <a href="{{ url('register') }}">Join us!</a>
                    </h4>
                    <div class="social-sign-in outer-top-xs  d-flex" style="justify-content: center;">
                        <a href="#" class="btn btn-info facebook-sign-in" id="fbicon"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn btn-warning twitter-sign-in" id="ticon"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
                <!-- Sign-in -->
                
                <!-- create a new account -->
                <div class="col-md-4 col-sm-3 create-new-account">

                </div>
                
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.row -->
</div><!-- /.sigin-in-->

@endsection
