@extends('webview.master')

@section('maincontent')
@section('title')
    {{$title}}
@endsection

<style>
    #affiliateh1{
        text-align: center;
        color: #0a045d;
        font-weight: bold;
    }
    #affh4 {
        font-size: 18px;
        text-align: justify;
        line-height: 24px;
        padding-top: 0px;
    }
    #space{
        padding-top:40px;
        padding-bottom: 40px;
    }
    #affimg{
        width: 130px;
        transform: rotate(-180deg);
        margin: auto;
        display: flex;

    }
    #affbtn{
        background: #0f6cb2;
        font-size: 20px;
        padding: 10px;
        display: flex;
        margin: auto;
        margin-top: 10px;
    }
    #ifremved{
        height:300px;
    }
    #carimg{
        height: 80px;
    }
    #crrh4{
        margin: 0;
        font-weight: bold;
        color: black;
        font-size: 22px;
        text-transform: uppercase;
    }
    #crrp{
        font-size: 14px;
        padding-top: 4px;
        padding-left: 26px;
    }
    
    .panel-body{
        padding-top:0px !important;
        text-align: justify;
    }
    .panel-heading{
        background:none !important;
    }
    
    #affcard{ 
        padding: 30px 25px;
        text-align: center;
        border-radius: 6px;
        box-shadow: 2px 2px 8px 2px #e8e8e8;
        background:white;
    }
    #affcardh1{
        margin: auto;
        border: 6px solid;
        height: 60px;
        width: 60px;
        line-height: 45px;
        border-radius: 50%;
        color: black;
    }
    
    @media only screen and (max-width: 600px) {
        #affiliateh1{ 
            font-size: 18px;
        }
        .outer-top-xs {
            margin-top: 0px;
        }
        #space {
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .d-none{
            display:none;
        }
        
        #ifremved {
            height: 200px;
            margin-top: 12px;
        }
        
        #affh4 {
            font-size: 14px;
            line-height: 20px; 
        }
        #affiliateh1 {
            font-size: 28px;
            padding-top: 2px;
        }
        
        #carimg {
            height: 55px;
        }
        #affbtn{
            margin-bottom: 15px;
        }
        #crrp {
            font-size: 11px;
            padding-top: 2px;
            padding-left: 20px;
        }
        #crrh4 {
            margin: 0;
            font-weight: bold;
            color: black;
            font-size: 18px;
            text-transform: uppercase;
        }
        #mt-2{
            margin-top:20px !important;
        }
        #smp{
            padding-top:10px;
        }
        .col-lg-12.item {
            padding: 0;
        }
        
        .checkout-box .checkout-steps .panel .panel-heading .unicase-checkout-title a span {
            background-color: #aaaaaa;
            color: #fff !important;
            display: inline-block;
            margin-right: 6px !important;
            padding: 8px 12px !important;
        }
        
        .checkout-box .checkout-steps .panel .panel-heading .unicase-checkout-title a {
            color: #555;
            text-transform: uppercase;
            display: block;
            font-size: 10px;
        }
        .mb-4{
            margin-bottom:20px;
        }

    }
</style>

@php
$bottombanners =\App\Models\Brand::where('status','Active')->select('id','brand_name','brand_icon')->get();
$basic=\App\Models\Basicinfo::first();
@endphp

<div class="container outer-top-xs outer-bottom-xs">
    <div class="row">
        <div class="col-xs-12">
            <h1 id="affiliateh1"><u>Contact Us</u></h1>
        </div>
    </div>
    
    <div class="row" id="space"> 
        <div class="col-xs-12 col-lg-4 mb-4">
            <div class="card" id="affcard">
                <div class="card-body">
                    <img src="{{asset('public/location.png')}}" style="width: 100px;">
                    <h4 id="affiliateh1">Find Us</h4>
                    <a style="text-align: justify;padding-top:10px">{{$basic->address}}</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-4 mb-4">
            <div class="card" id="affcard">
                <div class="card-body">
                    <img src="{{asset('public/phone.png')}}" style="width: 100px;">
                    <h4 id="affiliateh1">Make a Call <br> <span style="font-size:12px"></span> </h4>
                    <a href="tel:{{$basic->phone_one}}"style="text-align: justify;padding-top:10px">{{$basic->phone_one}}</a>
                    <br>
                    <a href="tel:{{$basic->phone_two}}"style="text-align: justify;padding-top:10px">{{$basic->phone_two}}</a>
                </div>
            </div>
        </div> 
        <div class="col-xs-12 col-lg-4 mb-4">
            <div class="card" id="affcard">
                <div class="card-body">
                    <img src="{{asset('public/email.png')}}" style="width: 100px;">
                    <h4 id="affiliateh1">Send Email</h4> 
                    <a style="text-align: justify;padding-top:10px">info@ayerich.com</a>
                    <br>
                    <a style="text-align: justify;padding-top:10px">{{$basic->email}}</a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contact-page">
		<div class="row"> 
			<div class="col-xs-12 col-md-6 contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193424!2d80.29172299999996!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1412844527190" width="600" height="450"  style="border:0"></iframe>
			</div>
			<div class="col-xs-12 col-md-6 contact-form">
				<div class="col-md-12 contact-title">
					<h4 style="font-size: 22px;text-align: center;text-transform: uppercase;font-weight: bold;color: darkblue;">Contact Form</h4>
				</div>
				<div class="col-md-6 ">
					<form class="register-form" role="form">
						<div class="form-group">
						<label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
						<input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
					</div>
					</form>
				</div>
				<div class="col-md-6">
					<form class="register-form" role="form">
						<div class="form-group">
						<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
						<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
					</div>
					</form>
				</div>
				<div class="col-md-12">
					<form class="register-form" role="form">
						<div class="form-group">
						<label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
						<input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Title">
					</div>
					</form>
				</div>
				<div class="col-md-12">
					<form class="register-form" role="form">
						<div class="form-group">
						<label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
						<textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
					</div>
					</form>
				</div>
				<div class="col-md-12 outer-bottom-small m-t-20 text-rignt">
					<button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="    font-size: 22px;">Send Message</button>
				</div>
			</div> 		
		</div><!-- /.contact-page -->
	</div><!-- /.row -->
      
    <div class="row" id="space">
        
            <h2 id="mt-2" style="margin-top: 20px;text-align: center;margin-bottom: 24px;color: black;"><u><b>SELSE POINT</b></u></h2>
            <div class="owl-carousel affiliate-carousel custom-carousel owl-theme outer-top-ss" style="padding-bottom: 20px;">
                <div class="col-lg-12 item">
                    <div class="card" id="affcard">
                        <div class="card-body">
                            <img src="{{asset('public/shop1.jpg')}}" style="width: 100px;">
                            <h4 id="affiliateh1">Lama Bazar<br> <span style="font-size:12px">+99862323323</span> </h4>
                            <p style="text-align: center;padding-top:10px"> 
                                House:22,Road:4,Block:D,Estern Housing,Mirpur:11.5
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 item">
                    <div class="card" id="affcard">
                        <div class="card-body">
                            <img src="{{asset('public/shop2.jpg')}}" style="width: 100px;">
                            <h4 id="affiliateh1">Grocery Hut<br> <span style="font-size:12px">+88032323</span> </h4>
                            <p style="text-align: center;padding-top:10px">
                                House:22,Road:4,Block:D,Estern Housing,Mirpur:11.5
                            </p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-12 item">
                    <div class="card" id="affcard">
                        <div class="card-body">
                            <img src="{{asset('public/shop3.jpg')}}" style="width: 100px;">
                            <h4 id="affiliateh1">Harun Super Shop<br><span style="font-size:12px">+8809464738332</span></h4>
                            <p style="text-align: center;padding-top:10px">
                               House:22,Road:4,Block:D,Estern Housing,Mirpur:11.5
                            </p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-12 item">
                    <div class="card" id="affcard">
                        <div class="card-body">
                            <img src="{{asset('public/shop4.jpg')}}" style="width: 100px;">
                            <h4 id="affiliateh1">Alibaba Shop<br><span style="font-size:12px">+880171538393</span></h4>
                            <p style="text-align: center;padding-top:10px">
                               House:22,Road:4,Block:D,Estern Housing,Mirpur:11.5
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
    
    
</div>


		
@endsection


