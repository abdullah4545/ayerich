@extends('webview.master')

@section('maincontent')
@section('title')
    TMS Marketing
@endsection



<style>
    #affiliateh1{
        text-align: center;
        color: #0a045d;
        font-weight: bold;
    }
    #affh4{
        font-size: 22px;
        text-align: center;
        line-height: 30px;
        padding-top: 15px;
    }
    #space{
        padding-top:40px;
        padding-bottom: 40px;
    }
    #affimg{
        width: 130px; 
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
            text-align: center;
            line-height: 21px;
            padding-top: 6px;
        }
        #affiliateh1 {
            font-size: 20px;
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
        <div class="col-md-2"></div>
        <div class="col-xs-12 col-md-8">
            <h1 id="affiliateh1">Buy Your Daily Needs From AyeRich And Get Rewards !</h1>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <div class="row" id="space">
        <div class="col-xs-12 col-md-6">
            <img src="{{asset('public/tms2.gif')}}" style="width:100%">
        </div> 
        <div class="col-md-1"></div>
        <div class="col-xs-12 col-md-5">
            <img src="{{asset('public/tms1.gif')}}" style="width:100%">
        </div>
    </div>
    
    <div class="row" id="space"> 
        <div class="col-xs-12 col-md-6">
            <h4 id="affh4">
                And how you can follow this blueprint to launch your own successful affiliate business even if you're starting from nothing - step-by-step!
            </h4>
            <img src="{{asset('public/tms1.gif')}}" id="affimg">
            
            <a href=""><button href="" class="btn btn-primary" id="affbtn">CLICK TO SHOP NOW</button></a>
        </div>
        <div class="col-xs-12 col-md-6">
            <iframe width="100%" id="ifremved" src="https://www.youtube.com/embed/iAwWfamXcSA"></iframe>
        </div>
    </div>
 
    <div class="row" id="space">
        
        <div class="col-xs-12 col-md-7" id="smp">
            <h4 id="crrh4">
                1. Information ?
            </h4>
            <p id="crrp">This complete guide will walk you through how to start making money in affiliate marketing, with online marketing tips and tricks to help you earn more money.</p>
             
            <h4 id="crrh4">
                2. Information Secound ?
            </h4>
            <p id="crrp">This complete guide will walk you through how to start making money in affiliate marketing, with online marketing tips and tricks to help you earn more money.</p>
             
            <h4 id="crrh4">
                3. Information ?
            </h4>
            <p id="crrp">This complete guide will walk you through how to start making money in affiliate marketing, with online marketing tips and tricks to help you earn more money.</p>
        
        </div> 
        
        <div class="col-xs-12 col-md-5">
              <img src="{{asset('public/tem4.gif')}}" style="width:100%">
        </div>
    </div>
    
    <div class="checkout-box faq-page">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading-title" id="affiliateh1" style="margin:0;text-transform: uppercase !important;text-align:center !important">Frequently Asked Questions</h2>
					<span class="title-tag" style="margin-bottom:10px;">Last Updated on November 02, 2014</span>
					<div class="panel-group checkout-steps" id="accordion" style="margin-top: 14px;">
						<!-- checkout-step-01  -->
                <div class="panel panel-default checkout-step-01">
                
                	<!-- panel-heading -->
                		<div class="panel-heading">
                    	<h4 class="unicase-checkout-title">
                	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                	          <span>1</span>Do you Ship Internationally ?
                	        </a>
                	     </h4>
                    </div>
                    <!-- panel-heading -->
                
                	<div id="collapseOne" class="panel-collapse collapse">
                
                		<!-- panel-body  -->
                	    <div class="panel-body">
                	    	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem. Donec ultricies, lorem sed ultrices interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis diam erat. Duis velit lectus, posuere a blandit sit amet, tempor at lorem.			
                		</div>
                		<!-- panel-body  -->
                
                	</div><!-- row -->
                </div>
                <!-- checkout-step-01  -->
			    <!-- checkout-step-02  -->
			  	<div class="panel panel-default checkout-step-02">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
				          <span>2</span>Who should I to contact if I have any queries?	
				        </a>
				      </h4>
				    </div>
				    <div id="collapseTwo" class="panel-collapse collapse">
				      <div class="panel-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
			  	</div>
			  	<!-- checkout-step-02  -->

				<!-- checkout-step-03  -->
			  	<div class="panel panel-default checkout-step-03">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
				       		<span>3</span>How do I track my order ?
				        </a>
				      </h4>
				    </div>
				    <div id="collapseThree" class="panel-collapse collapse">
				      <div class="panel-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
			  	</div>
			  	<!-- checkout-step-03  -->

				<!-- checkout-step-04  -->
			    <div class="panel panel-default checkout-step-04">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
				        	<span>4</span>How can I cancel or change my order ?
				        </a>
				      </h4>
				    </div>
				    <div id="collapseFour" class="panel-collapse collapse">
					    <div class="panel-body">
					        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					    </div>
			    	</div>
				</div>
				<!-- checkout-step-04  -->

				<!-- checkout-step-05  -->
			  	<div class="panel panel-default checkout-step-05">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
				        	<span>5</span>How can I return a product
				        </a>
				      </h4>
				    </div>
				    <div id="collapseFive" class="panel-collapse collapse">
				      <div class="panel-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
			    </div>
			    <!-- checkout-step-05  -->

				<!-- checkout-step-06  -->
			  	<div class="panel panel-default checkout-step-06">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
				        	<span>6</span>How long will it take to get my package ?
				        </a>
				      </h4>
				    </div>
			    	<div id="collapseSix" class="panel-collapse collapse">
			      		<div class="panel-body">
			        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      		</div>
			    	</div>
			  	</div>
			  	<!-- checkout-step-06  -->

			  	<!-- checkout-step-07  -->
			  	<div class="panel panel-default checkout-step-07">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSeven">
				        	<span>7</span>What Shipping methods are available ?
				        </a>
				      </h4>
				    </div>
			    	<div id="collapseSeven" class="panel-collapse collapse">
			      		<div class="panel-body">
			        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      		</div>
			    	</div>
			  	</div>
			  	<!-- checkout-step-07  -->

			  	<!-- checkout-step-08  -->
			  	<div class="panel panel-default checkout-step-08">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseEight">
				        	<span>8</span>Do you provide any warranty ?
				        </a>
				      </h4>
				    </div>
			    	<div id="collapseEight" class="panel-collapse collapse">
			      		<div class="panel-body">
			        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      		</div>
			    	</div>
			  	</div>
			  	<!-- checkout-step-08  -->

			  	<!-- checkout-step-09  -->
			  	<div class="panel panel-default checkout-step-09">
				    <div class="panel-heading">
				      <h4 class="unicase-checkout-title">
				        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseNine">
				        	<span>9</span>Do you have replacement guarantee ?
				        </a>
				      </h4>
				    </div>
			    	<div id="collapseNine" class="panel-collapse collapse">
			      		<div class="panel-body">
			        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      		</div>
			    	</div>
			  	</div>
			  	<!-- checkout-step-09  -->
			  	
			</div><!-- /.checkout-steps -->
		</div>
	</div><!-- /.row -->
</div><!-- /.checkout-box -->
</div>


		
@endsection


