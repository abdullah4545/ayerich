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
    #bgimgcon{
       /*background-image: url(../public/ligel.png);*/
        background-size: auto;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
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

    }
</style>
 

<div class="container outer-top-xs outer-bottom-xs">
    <div class="row d-none d-lg-block">
        <div class="col-xs-12" style="display: flex;justify-content: center;">
            <img src="{{asset('public/terms.png')}}" style="width:10%;border-radius: 6px;">
            <h1 id="affiliateh1" style="padding-top:26px"><u>Terms & Conditions</u></h1>
            <img src="{{asset('public/terms.png')}}" style="width:10%;border-radius: 6px;">
        </div>
    </div>
    <div class="row d-lg-none d-block">
        <div class="col-xs-12" style="text-align: center;">
            <img src="{{asset('public/terms.png')}}" style="width:30%;border-radius: 6px;">
            <h1 id="affiliateh1" style="margin:0px"><u>Terms & Conditions</u></h1> 
        </div>
    </div>
    <div class="row" id="space"> 
        <div class="col-xs-12 col-md-6">
            <h4 id="affh4">
                Welcome to Ayerich.com, an eCommerce website operated by Ayerich Private Limited. By using and accessing our website, you accept and agree to be bound by the following terms and conditions. If you do not agree to these terms, please do not use this website. 
            </h4> 
            <div class="d-flex" style="">
                
                <h4 id="affh4">
                    <span style="font-size: 20px;"><b>Acceptance of Terms:</b></span> <br>
                   By accessing and using Ayerich.com, you acknowledge that you have read, understood and agreed to these terms and conditions, as well as our privacy policy.
                </h4> 
                <img src="{{asset('public/terms-condition.png')}}" style="width:44%;border-radius: 6px;">
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-5" id="mt-2">
             <img src="{{asset('public/condition.png')}}" style="width:100%;border-radius: 6px;">
        </div> 
    </div>

    <div class="row d-none d-lg-block">
        <div class="col-xs-12" style="display: flex;justify-content: center;"> 
            <h1 id="affiliateh1" style="padding-top:55px"><u>Please Read The </u></h1>
            <img src="{{asset('public/tsil.png')}}" style="width:20%;border-radius: 6px;">
            <h1 id="affiliateh1" style="padding-top:55px"><u>List Of Conditions</u></h1>
        </div>
    </div>
    
    <div class="row d-lg-none d-block">
        <div class="col-xs-12" style="display: flex;justify-content: center;"> 
            <h1 id="affiliateh1" style="padding-top:55px"><u>Please Read The List Of Conditions</u></h1>
            <img src="{{asset('public/tsil.png')}}" style="width:30%;border-radius: 6px;position: absolute;">
        </div>
    </div>
</div> 

<div class="container outer-top-xs outer-bottom-xs" id="bgimgcon">    
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>User Accounts:</b></span> <br>
                In order to access certain features of Ayerich.com, you may need to create a user account. You are responsible for maintaining the confidentiality of your account information, and you agree to notify us immediately if you become aware of any unauthorized use of your account.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Product Information:</b></span> <br>
                We make every effort to ensure that the information on Ayerich.com is accurate and up-to-date. However, we cannot guarantee that all product descriptions, prices, or other information are error-free. We reserve the right to correct any errors, inaccuracies or omissions and to change or update information at any time without prior notice.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Ordering:</b></span> <br>
                When you place an order through Ayerich.com, you are making an offer to purchase the product at the stated price. We reserve the right to accept or decline any order for any reason, including if the product is out of stock, if there is an error in the price or product information, or if we suspect fraudulent activity.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Payment:</b></span> <br>
                We accept payment by credit card, PayPal, or other payment methods as indicated on Ayerich.com. By submitting payment information, you represent and warrant that you are authorized to use the payment method and authorize us to charge the payment method for the total amount of your order.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Shipping: </b></span> <br>
                We will ship your order to the shipping address provided during the checkout process. We do not guarantee any delivery times and are not responsible for any delays or damages caused by the shipping carrier. You are responsible for all shipping costs and any customs fees, taxes or other charges that may be imposed by your country.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>   
</div> 
<div class="container outer-top-xs outer-bottom-xs">    
    <div class="row d-none d-lg-block">
        <div class="col-xs-12" style="display: flex;justify-content: center;"> 
            <h1 id="affiliateh1" style="padding-top:55px"><u>Please Read Our </u></h1>
            <img src="{{asset('public/legal.png')}}" style="width:20%;border-radius: 6px;">
            <h1 id="affiliateh1" style="padding-top:55px"><u>Legal Conditions</u></h1>
        </div>
    </div>
    
    <div class="row d-lg-none d-block">
        <div class="col-xs-12" style="display: flex;justify-content: center;"> 
            <h1 id="affiliateh1" style="padding-top:55px;font-size: 26px;"><u>Please Read Our Legal Conditions</u></h1>
            <img src="{{asset('public/legal.png')}}" style="width:38%;border-radius: 6px;position: absolute;">
        </div>
    </div>
</div>

<div class="container outer-top-xs outer-bottom-xs" id="bgimgcon">    
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Returns and Refunds:</b></span> <br>
                We offer a return and refund policy for products that are damaged or defective upon receipt. If you wish to return a product, please contact us within 14 days of receiving the product to request a return. We reserve the right to refuse returns for any reason, including if the product has been used or is not in its original condition.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Intellectual Property: </b></span> <br>
                All content on Ayerich.com, including but not limited to text, graphics, logos, images, and software, is the property of Ayerich Private Limited or its licensors and is protected by copyright and other intellectual property laws. You may not copy, reproduce, distribute, or otherwise use any of the content without our prior written consent.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Limitation of Liability:</b></span> <br>
                Ayerich Private Limited is not liable for any damages, including but not limited to direct, indirect, incidental, special, or consequential damages arising from the use or inability to use Ayerich.com, even if we have been advised of the possibility of such damages.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Governing Law:</b></span> <br>
                These terms and conditions shall be governed by and construed in accordance with the laws of the jurisdiction in which Ayerich Private Limited is located, without giving effect to any principles of conflicts of law.
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"> 
        </div>
        <div class="col-xs-12 col-md-10"> 
            <h4 id="affh4">
                <span style="font-size: 20px;"><b>Modifications: </b></span> <br>
                We reserve the right to modify these terms and conditions at any time without prior notice. Your continued use of Ayerich.com following any such changes constitutes your acceptance of the new terms and conditions.Thank you for using Ayerich.com!
            </h4> 
        </div>
        <div class="col-md-1"> 
        </div>
    </div>   
</div> 

<div class="container">
     
    <div class="row"> 
        <div class="col-xs-12 col-md-5" id="mt-2">
             <img src="{{asset('public/trmb.png')}}" style="width:100%;border-radius: 6px;">
        </div> 
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-6" style="padding-top: 60px;">
            <h4 id="affh4">
                Welcome to Ayerich.com, an eCommerce website operated by Ayerich Private Limited. By using and accessing our website, you accept and agree to be bound by the following terms and conditions. If you do not agree to these terms, please do not use this website. 
            </h4> 
            <div class="d-flex">
                
                <h4 id="affh4">
                    <span style="font-size: 20px;"><b>Acceptance of Terms:</b></span> <br>
                   By accessing and using Ayerich.com, you acknowledge that you have read, understood and agreed to these terms and conditions, as well as our privacy policy.
                </h4> 
                <img src="{{asset('public/terms.png')}}" style="width:44%;border-radius: 6px;">
            </div>
        </div> 
        
    </div>
 
</div> 

<div class="container outer-top-xs outer-bottom-xs">    
    
    <div class="row" id="space">
        <h2 id="mt-2" style="margin-top: 20px;text-align: center;margin-bottom: 24px;color: black;"><u><b>VISITE OUR PROFILE</b></u></h2>
        <div class="col-xs-12 col-md-6">
            <iframe width="100%" id="ifremved" src="https://www.youtube.com/embed/HVXH-5FuNSE"></iframe>
        </div> 
        <div class="col-xs-12 col-md-6">
            <iframe width="100%" id="ifremved" src="https://www.youtube.com/embed/HVXH-5FuNSE"></iframe>
        </div>
    </div>
     
     
</div>


		
@endsection


