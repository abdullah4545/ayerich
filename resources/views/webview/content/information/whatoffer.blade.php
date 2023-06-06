@extends('webview.master')

@section('maincontent')
@section('title')
    What We Offer
@endsection
<title></title>
<style>
 
   .title{
    margin: 0px auto;
    text-align: center
   } 
   .title h4 {
        font-size: 30px;
        font-weight: bold;
    }
   .dsfhrur{
    margin: 20px 0px;
   }
   .cart_coll{
    margin: 0px auto !important;
   }
   .cart_img{
    width: 120px;
    height: 120px;
    text-align: center;
   }
   .cart_img img{
     width: 100%;
     height: 100%;
     size: cover;
     border-radius:50%;
   }
   .offer_cart{
    width: 50%;
    padding: 25px 10px;
    display: flex;
    background: #ffffff;
    justify-content: center;
    align-items: center;
    margin: 0px auto;
    border-radius: 10px;
   }
    
    .cart_bttns {
        margin: 0px 10px;
        width: 279px;
        text-align: center;
        background-color: #0f6cb2;
        border-radius: 6px;
        padding: 20px 30px;
        box-shadow: 6px 6px 8px #d6d6d6;
        margin-left: 25px;
    }
    
   .cart_bttns h4{
        font-size: 36px;
        color: #fff;
      }
    .cart_bttnsmall a {
        text-decoration: none;
        font-size: 23px;
        padding: 5px 15px;
        background: #fd7322;
        border-radius: 5px;
        margin-left: -40px;
        padding: 8px 14px;
        box-shadow: 1px 1px 22px 0px rgb(147 141 141);
        color: white;
    }
@media only screen and (max-width: 600px){
   .offer_cart{
     width: 100%;
   }
   
   .cart_img {
        width: 80px;
        height: 80px;
        text-align: center;
    }
    
    .cart_bttns {
        margin: 0px 8px;
        width: 200px;
        text-align: center;
        background-color: #0f6cb2;
        border-radius: 6px;
        padding: 18px 10px;
        box-shadow: 6px 6px 8px #d6d6d6;
        margin-left: 10px;
    }
    
    .cart_bttnsmall a {
        text-decoration: none;
        font-size: 18px;
        padding: 5px 15px;
        background: #fd7322;
        border-radius: 5px;
        margin-left: -35px;
        padding: 8px 12px;
        box-shadow: 1px 1px 22px 0px rgb(147 141 141);
        color: white;
    }
 
    .cart_bttns h4 {
        font-size: 24px;
        padding: 0px 0px;
        border-radius: 4px;
    }
      
     .title h4 {
        font-size: 22px;
        font-weight: bold;
    }
}

 
</style>
 

<div class="body-content">

  <div class="container outer-top-xs outer-bottom-xs" style="padding-bottom:40px">
    <div class="title">
        <h4>What We Offer</h4>
    </div>
    <div class="row dsfhrur">
     <div class="col-10 cart_coll">
       <div class="offer_cart">
        <div class="cart_img">
         <img  src="https://www.kindpng.com/picc/m/33-337408_tag-label-discount-sell-offer-buy-new-offer.png" alt="">       
        </div>
        <div class="cart_btn">
         <div class="cart_bttns">
           <h4>TMS</h4>
         </div>
        </div>
        <div class="cart_btn">
            <div class="cart_bttnsmall">
               <a href="{{ url('tms') }}">GO</a>
            </div>
           </div>
       </div>
     </div>
    </div>

    <div class="row dsfhrur">
        <div class="col-10 cart_coll">
          <div class="offer_cart">
           <div class="cart_img">
            <img  src="https://cdn-icons-png.flaticon.com/512/1458/1458482.png" alt="">       
           </div>
           <div class="cart_btn">
            <div class="cart_bttns">
               <h4>Affiliate</h4>
            </div>
           </div>
           <div class="cart_btn">
               <div class="cart_bttnsmall">
                  <a href="{{ url('affiliate') }}">GO</a>
               </div>
              </div>
          </div>
        </div>
       </div>

       <div class="row dsfhrur">
        <div class="col-10 cart_coll">
          <div class="offer_cart">
           <div class="cart_img">
            <img  src="https://cdn-icons-png.flaticon.com/512/306/306207.png" alt="">       
           </div>
           <div class="cart_btn">
            <div class="cart_bttns">
               <h4>Team Work</h4>
            </div>
           </div>
           <div class="cart_btn">
               <div class="cart_bttnsmall">
                  <a href="{{ url('team/work') }}">GO</a>
               </div>
              </div>
          </div>
        </div>
       </div>
</div>




</div>

@endsection


