@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}-User Dashboard
@endsection

<style>
    #plg{
        padding-bottom: 26px;
    }
    #lgnone{
        display: none !important;
    }
    .mb-4{
        margin-bottom:20px;
    }

    @media only screen and (max-width: 600px) {
        #plg{
            padding-bottom: 8px;
        }
        .p-4{
            padding: 10px;
            padding-top:0px;
        }
        #psm{
            padding-top:20px;
        }
          #copyreflink{
            width: 100%;
            font-size: 20px;
            padding: 10px;
            margin-top: 10px;
        }
        #linksm{
            text-align: right;
        }
        #lgnone{
            display: flex !important;
        }
    }
    
    #profileImage {
        border-radius: 50%;
        padding: 65px;
        padding-bottom: 8px;
        padding-top: 10px;
    }

    

    ul.categories {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.categories--style-3>li {
        border: 0;
    }

    ul.categories>li {
        border-bottom: 1px solid #f1f1f1;
    }

    .widget-profile-menu a i {
        opacity: 0.6;
        font-size: 13px !important;
        top: 0 !important;
        width: 18px;
        height: 18px;
        text-align: center;
        line-height: 18px;
        display: inline-block;
        margin-right: 0.5rem !important;
    }

    .category-name {
        color: black;
        font-size: 18px;
    }

    .category-icon {
        font-size: 18px;
        color: black;
    }

    .card {
        --bs-card-spacer-y: 1rem;
        --bs-card-spacer-x: 1rem;
        --bs-card-title-spacer-y: 0.5rem;
        --bs-card-border-width: 1px;
        --bs-card-border-color: var(--bs-border-color-translucent);
        --bs-card-border-radius: 0.375rem;
        --bs-card-box-shadow: ;
        --bs-card-inner-border-radius: calc(0.375rem - 1px);
        --bs-card-cap-padding-y: 0.5rem;
        --bs-card-cap-padding-x: 1rem;
        --bs-card-cap-bg: rgba(0, 0, 0, 0.03);
        --bs-card-cap-color: ;
        --bs-card-height: ;
        --bs-card-color: ;
        --bs-card-bg: #fff;
        --bs-card-img-overlay-padding: 1rem;
        --bs-card-group-margin: 0.75rem;
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: var(--bs-card-bg);
        background-clip: border-box;
        border: var(--bs-card-border-width) solid var(--bs-card-border-color);
        border-radius: var(--bs-card-border-radius);
    }

    . {
        color: white;
    }

    .pt-4 {
        padding-top: 1.5rem !important;
    }

    .bg-success {
        --bs-bg-opacity: 1;
        background-color: green !important;
    }

    .text-center {
        text-align: center !important;
    }

    .p-2 {
        padding: 0.5rem !important;
    }

    .mb-2 {
        margin-bottom: 0.5rem !important;
    }
</style>


<div class="outer-top-xs outer-bottom-xs">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                @include('webview.user.sidebar')
            </div>
            <div class="col-lg-9">
                    <div class="d-flex" id="lgnone" style="justify-content: space-between;padding: 10px;    background: white;">
                        @if (isset(Auth::user()->profile))
                            <img src="{{ asset(Auth::user()->profile) }}" alt=""
                                style="border-radius: 50%; height: 38px;">
                        @else
                            <img src="{{ asset('public/backend/img/user.jpg') }}" alt=""
                                style="border-radius: 50%; height: 38px;">
                        @endif
                        @if (isset(Auth::user()->name)) 
                            <div class="svg_text" style="font-size: 14px;padding-top: 8px;font-weight: bold;">{{Auth::user()->name}}</div>
                        @else 
                        @endif
                        
                    </div>
                    <div class="p-0" id="psm">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 mb-4">
                            <div class="account">
                                <div class="card text-center bg-danger pt-4 user_card_text" style="font-size: 26px;padding-top: 14px !important;">     
                                    <a href="{{ url('user/shops') }}">
                                        <img src="{{asset('public/shop.png')}}" style="width: 50%;padding: 8px 10px;padding-bottom:3px"> 
                                    </a>
                                        <a href="{{ url('user/shops') }}" class="btn btn-primary" style="width:100%;background:none;color:black">Shop Now</a>  
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-xs-6 mb-4">
                            <div class="account">
                                <div class="card text-center bg-danger pt-4 user_card_text" style="font-size: 26px;">     
                                   <a type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" style="padding-bottom: 0;">
                                    <img src="{{asset('public/payment.png')}}" style="width: 50%;padding: 8px 10px;">
                                    </a>
                                    <a type="button" class="btn btn-primary" style="background:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">Mobile Recharge</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6 mb-4">
                            <div class="account">
                                <div class="card text-center bg-danger pt-4 user_card_text" style="font-size: 26px;">     
                                   <a type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" style="padding-bottom: 0;">
                                    <img src="{{asset('public/bank.png')}}" style="width: 50%;padding: 8px 10px;">
                                    </a>
                                    <a type="button" class="btn btn-primary" style="background:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">Fixed Deposit</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6 mb-4">
                            <div class="account">
                                <div class="card text-center bg-danger pt-4 user_card_text" style="font-size: 26px;">     
                                   <a type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter" id="plg">
                                    <div class="d-flex" style="font-size: 22px;justify-content: center;padding: 10px 14px;"><div id="valueaa">0</div>.<div id="value">100</div></div>
                                    </a>
                                    <a type="button" class="btn btn-primary" style="background:none;color:black" data-toggle="modal" data-target="#exampleModalCenter">Future Fund</a>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Mobile Recharge</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                          <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" aria-label="Default select example">
                                                <option selected>Select menu</option>
                                                <option value="1">Robi</option>
                                                <option value="2">Grameanphone</option>
                                                <option value="3">Atel</option>
                                              </select>
                                        </div>
                                        <div class="form-group">
                                          <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Amount">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                </div>
                              </div>
                            </div>
                          </div> 
                    
                    </div>
                </div>
                

                <div class="p-2">
                    <div class="row">
                        <div class="col-lg-12 mb-2 p-4">

                            <div class="card">
                                <div class="row" style="font-size: 25px;font-weight: bold;padding: 8px;">
                                    <div class="col-lg-3 col-xs-3" style="padding-right:0">Link:</div>
                                    <div class="col-lg-6 col-xs-9" style="padding-left:0" id="linksm">
                                        <span
                                            style="color: #081a33">../{{ Auth::guard('web')->user()->my_referral_id }}</span>
                                    </div>
                                    <div class="col-lg-3 col-xs-12"
                                        style="text-align: right;">
                                        <input type="text"
                                            value="{{ url('/register') }}/{{ Auth::guard('web')->user()->my_referral_id }}"
                                            id="referrallink" hidden
                                            style="color: black;width: 100%; border: none; font-weight: bold;">
                                        <button id="copyreflink" style="background: none;border: 1px solid #0f6cb2;color: black;"
                                            class="btn btn-primary">Copy Referral
                                            Link</button>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 



<script>
    function animateValue(obj, start, end, duration) {
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    }
    
    const obj = document.getElementById("value");
    animateValue(obj, 1, 100000, 10000000);
    
    function aaanimateValue(aaobj, start, end, duration) {
      let startTimestamp = null;
      const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        aaobj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
          window.requestAnimationFrame(step);
        }
      };
      window.requestAnimationFrame(step);
    }
    
    const aaobj = document.getElementById("valueaa");
    aaanimateValue(aaobj, 1, 1000, 100000000);
    
    

</script>

 
@endsection
