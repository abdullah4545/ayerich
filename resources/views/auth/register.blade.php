@extends('webview.master-login')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-Register
@endsection
<style>
  .body-content{ 
        height: 100vh; 
    }
    #viewstext{
        font-weight: bold;
    }
    #hidest{
        display:none;
    }
    #sbar{
        height: 4px;
        background: gray;
        border-radius: 20px;
        width:70px;
        margin-right:10px;
        float:left;
    }
    #sbar1{
        height: 4px;
        background: gray;
        border-radius: 20px;
        width:70px;
        margin-right:10px;
        float:left;
    }
    #sbar2{
        height: 4px;
        background: gray;
        border-radius: 20px;
        width:70px;
        margin-right:10px;
        float:left;
    }
    input{
        
    border: none !important;
    border-bottom: 2px solid !important;

    }
     select{
        
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

<div class="body-content">
    <div class="container">
        <div class="m-b-10 m-t-10">
            <div class="row" style="margin:auto">
                <!-- create a new account -->
                <div class="col-md-4 col-sm-4 create-new-account">

                </div>
                <!-- Sign-in -->
                <div class="sign-in-page col-md-4 col-sm-4 sign-in" style="    border-radius: 4px;">
                    <h4 class="" style="text-align: center;font-size: 30px;font-weight:bold;color: #0f6cb2;">Sign Up</h4>
                    <p class=""></p>
                    <form class="register-form outer-top-xs" method="POST" action="{{ url('register') }}"
                        role="form">
                        @csrf
                        <div class="form-group"> 
                            <input type="text" name="name"  placeholder="Name" class="form-control unicase-form-control text-input"
                                required>
                        </div>
                        <div class="form-group"> 
                            <input type="email" name="email" placeholder="Email Address" class="form-control unicase-form-control text-input"
                                required>
                        </div>
 
                        <div class="form-group" style="display: flex;">
                            <span class="form-control unicase-form-control text-input" id="basic-addon1"
                                style="width: 12%;
    margin-right: -8px;border: none;  border-bottom: 2px solid #505050;">@</span>
                            <input type="text" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$"
                                title="Username minimum six characters, at least one letter and one number and no special character."
                                onchange="checkunick()" class="form-control unicase-form-control text-input"
                                id="username" name="username" placeholder="Username" aria-label="Username"
                                aria-describedby="basic-addon1" required>
                        </div>
                        <div class="message w-100" style="margin-bottom: 10px;">
                            <small id="avaliableusername" style="color: green;display:none"><i class="fa fa-check me-2"
                                    style="background: green; color: white; padding: 5px; border-radius: 50%; margin-top: 6px;"></i>
                                Username available</small>
                            <small id="unavaliableusername" style="color: red;display:none"><i class="fa fa-check me-2"
                                    style="background: red; color: white; padding: 5px; border-radius: 50%; margin-top: 6px;"></i>Username
                                unavailable</small>
                        </div>
 
                        <div class="form-group">
                            <select id="address-country" class="form-control" name="country"></select>
                        </div>

                        <div class="form-group" id="phoneSet">
                            <input id="phone" name="phone" type="tel"
                                style="padding: 10px 10px 10px 76px;width: 100%;font-size: 18px;">
                            <span id="valid-msg" class="hide">✓ Valid</span>
                            <span id="error-msg" class="hide"></span>
                        </div> 

                        <div class="form-group"> 
                            <input type="password" onkeyup="strong()" placeholder="Password" name="password" class="form-control unicase-form-control text-input"
                                id="password" required>
                        </div>
                        <div class="form-group"> 
                            <input type="password"  placeholder="Confirm Password" onkeyup="checkpass()" id="confirm_password"
                                class="form-control unicase-form-control text-input" required>
                            <small id="confirm_passwordtextmatch" style="color: deepskyblue;display:none">Password
                                Matched</small>
                            <small id="confirm_passwordtext" style="color: red;display:none">Password Not
                                Matched</small>
                        </div>
                        
                        <div class="form-group" style="width: 100%;float: left;" id="hidest">
                            <div id="sbar"></div>
                            <div id="sbar1"></div>
                            <div id="sbar2"></div>
                        </div>
                        <p id="viewstext"></p>
                        
                        @if (empty($slug)) 
                            <div class="form-group">
                                <input type="checkbox" id="myCheck" onclick="showhiderefer()">
                                <label for="myCheck" style="font-size: 18px;">Have any referral?</label> 
                            </div>

                            <div class="form-group" id="referid" style="display:none">
                                <label for="floatingInput">Referral ID</label>
                                <input type="text" class="form-control" name="referral_by" id="referral_byCheck"
                                    placeholder="Referral"
                                    @if (empty($slug)) @else value="{{ $slug }}" readonly @endif > 
                            </div>
                        @else 
                            <div class="form-group">
                                <label for="floatingInput">Referral ID</label>
                                <input type="text" class="form-control" name="referral_by" id="referral_by"
                                    placeholder="Referral"
                                    @if (empty($slug)) @else value="{{ $slug }}" readonly @endif required> 
                            </div>
                        @endif
                        
                        
                        <button type="submit" id="submit-button"
                            class="btn-block btn-upper btn btn-primary checkout-page-button">Submit</button>
                    </form>
                    <h4 class="text-center" style="margin-top: 20px;margin-bottom:20px;">
                        Already have an account? <a href="{{ url('login') }}">Sign in</a>
                    </h4>
                    <div class="social-sign-in outer-top-xs d-flex" style="justify-content: center;">
                        <a href="#" class="btn btn-info facebook-sign-in" id="fbicon"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn btn-warning twitter-sign-in" id="ticon"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-4 col-sm-4 create-new-account">

                </div>
                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.row -->
</div><!-- /.sigin-in-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
    integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"
    integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function strong(){  
        var pass=$('#password').val();
        var passw=  /^[A-Za-z]\w{7,14}$/;
        if(pass.match(passw)) 
        { 
            $('#hidest').css('display','inline-block');
            $('#viewstext').text('Strong Password');
            $('#viewstext').css('color','Green');
            $('#sbar').css('background','#05c605');
            $('#sbar1').css('background','#049904');
            $('#sbar2').css('background','Green');
        }
        else
        { 
            $('#hidest').css('display','inline-block');
            $('#viewstext').text('Password Week');
            $('#viewstext').css('color','#ff6d00');
            $('#sbar').css('background','yellow');
            $('#sbar1').css('background','#ffd20a');
            $('#sbar2').css('background','#ff6d00');
        }
    }
    
     

    function showhiderefer(){
        var checkBox = document.getElementById("myCheck");
          var text = document.getElementById("referid");
          if (checkBox.checked == true){
            text.style.display = "block";
            $('#referral_byCheck').attr('required','true');   
          } else {
             text.style.display = "none";
             $('#referral_byCheck').removeAttr('required'); 
          }
    }
    // get the country data from the plugin
    var countryData = window.intlTelInputGlobals.getCountryData(),
        input = document.querySelector("#phone"),
        addressDropdown = document.querySelector("#address-country"),
        errorMsg = document.querySelector("#error-msg"),
        validMsg = document.querySelector("#valid-msg");


    // here, the index maps to the error code returned from getValidationError - see readme
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];



    // initialise plugin
    var iti = window.intlTelInput(input, {
        initialCountry: 'BD',
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"
    });

    // populate the country dropdown
    for (var i = 0; i < countryData.length; i++) {
        var country = countryData[i];
        var optionNode = document.createElement("option");
        optionNode.value = country.iso2;
        var textNode = document.createTextNode(country.name);
        optionNode.appendChild(textNode);
        addressDropdown.appendChild(optionNode);
    }

    var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    // on blur: validate
    input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                validMsg.classList.remove("hide");
            } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
            }
        }
    });

    // on keyup / change flag: reset
    input.addEventListener('change', reset);
    input.addEventListener('keyup', reset);

    // set it's initial value
    addressDropdown.value = iti.getSelectedCountryData().iso2;

    // listen to the telephone input for changes
    input.addEventListener('countrychange', function(e) {
        addressDropdown.value = iti.getSelectedCountryData().iso2;
    });

    // listen to the address dropdown for changes
    addressDropdown.addEventListener('change', function() {
        iti.setCountry(this.value);
    });

    function checkpass() {
        var pass = $('#password').val();
        var con_pass = $('#confirm_password').val();
        if (pass == con_pass) {
            $('#confirm_passwordtext').css('display', 'none');
            $('#confirm_passwordtextmatch').css('display', 'inline');
            $('#submit-button').prop('disabled', false);
        } else {
            $('#confirm_password').focus();
            $('#confirm_passwordtext').css('display', 'inline');
            $('#confirm_passwordtextmatch').css('display', 'none');
            $('#submit-button').prop('disabled', true);
        }
    }

    function checkunick() {
        var username = $('#username').val();
        $.ajax({
            type: "GET",
            url: "{{ url('check/username') }}/" + username,

            success: function(data) {

                if (data == 'taken') {
                    $('#username').focus();
                    $('#submit-button').prop('disabled', true);
                    $('#avaliableusername').css('display', 'none');
                    $('#unavaliableusername').css('display', 'inline');
                } else {
                    $('#avaliableusername').css('display', 'inline');
                    $('#unavaliableusername').css('display', 'none');
                    $('#submit-button').prop('disabled', false);
                }
            }
        });
    }
</script>

<style>
    .intl-tel-input {
        width: 100%;
    }

    .iti.iti--allow-dropdown.iti--separate-dial-code {
        width: 100% !important;
    }
</style>
@endsection
