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
    #helpt{
        width: 25%;
    }
    
    @media only screen and (max-width: 600px) {
        #helpt{
            width: 55%;
        }
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

    }
</style>

 

<div class="container outer-top-xs outer-bottom-xs">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1 id="affiliateh1"><u>CUSTOMER SERVICE</u></h1>
        </div>
    </div>
    <div class="row" id="space"> 
        <div class="col-xs-12 col-md-5" id="mt-2">
             <img src="{{asset('public/help1.png')}}" style="width:100%;border-radius: 6px;">
        </div> 
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-6">
            <h2 style="margin-top:0px;" class="d-none d-lg-block"> <b>HOW TO USE :</b> </h2>
            <h4 id="affh4">
                The About Us page of your website is an essential source of information for all who want to know more about your business. 
            </h4> 
            <h4 id="affh4">
                About Us pages are where you showcase your history, what is unique about your work, your company’s values, and who you serve. 
            </h4> 
            <h4 id="affh4">
                About Us pages are where you showcase your history, what is unique about your work, your company’s values, and who you serve. 
            </h4> 
        </div> 
        
    </div>  
    <div class="row" id="space">
        {!! $value->value !!}
    </div>
    <div class="row" id="space">
        
        <h2 id="mt-2" style="margin-top: 20px;text-align: center;margin-bottom: 24px;color: black;"><u><b>OUR CUSTOMER SUPPORT TEAM</b></u></h2>
        <div class="owl-carousel affiliate-carousel custom-carousel owl-theme outer-top-ss" style="padding-bottom: 20px;">
            <div class="col-lg-12 item">
                <div class="card" id="affcard">
                    <div class="card-body">
                        <img src="{{asset('public/callcenter.png')}}" style="width: 100px;">
                        <h4 id="affiliateh1">Abdullah Md. Muraiem <br> <span style="font-size:12px">Customer Care Officer</span> </h4> 
                    </div>
                </div>
            </div>
            <div class="col-lg-12 item">
                <div class="card" id="affcard">
                    <div class="card-body">
                        <img src="{{asset('public/callcenter.png')}}" style="width: 100px;">
                        <h4 id="affiliateh1">Md. Jumman <br> <span style="font-size:12px">Customer Care Officer</span> </h4> 
                    </div>
                </div>
            </div> 
            <div class="col-lg-12 item">
                <div class="card" id="affcard">
                    <div class="card-body">
                        <img src="{{asset('public/callcenter.png')}}" style="width: 100px;">
                        <h4 id="affiliateh1">Md. Umor Faroq <br><span style="font-size:12px">Customer Care Officer</span></h4> 
                    </div>
                </div>
            </div> 
        </div>
    
    </div>
    
    <div class="row" id="space" style="padding-top:0px">
        <h2 id="mt-2" style="text-align: center;margin-bottom: 24px;color: black;"><u><b>SEE OUR INSTRUCTIONS</b></u></h2>
        <div class="col-xs-12 col-md-6">
            <iframe width="100%" id="ifremved" src="https://www.youtube.com/embed/HVXH-5FuNSE"></iframe>
        </div> 
        <div class="col-xs-12 col-md-6">
            <iframe width="100%" id="ifremved" src="https://www.youtube.com/embed/HVXH-5FuNSE"></iframe>
        </div>
    </div>
     
</div>


		
@endsection


