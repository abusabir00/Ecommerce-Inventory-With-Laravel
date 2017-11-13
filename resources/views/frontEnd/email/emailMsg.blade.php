 <style type="text/css">
 .wrapper{width:60%; margin:5% auto;height:100vh;  box-shadow:0 0 2px #aaa; font-family:Hind;}
.logo_header{width:100%; height:70px;background:#1CA8DD; padding:10px;}
.email_body{width:100%; padding:0 15px;}
.receipt_list{width:100%;}
.receipt_list .left_list{float:left; width:60%;}
.receipt_list .right_list{float:left; width:40%;}
 .left_list b,.right_list b{width:100%; float:left; margin:0 0 10px 0;}
 .left_list span,.right_list span{width:100%; float:left; margin:0 0 5px 0;}
 .right_list span{text-align:left; padding-left:15%;}
 .list_divider{width:100%; border-top:1px solid rgba(0,0,0,0.2);float:left;}
 .invoice_trans{width:100%;float:left; margin:5px 0;}
.invoice_left{float:left; width:60%;}
.invoice_right{float:left; width:40%;}	
 </style>

  <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
  <div class="container">
	<div class="row">
		        
		        <div class="wrapper">
		            <div class="logo_header">
		                <a href="seedoconline.com"><img src="{{url('/public/admin/upload/logo/bgLogo.jpg')}}"/></a>
		            </div>
		            <div class="email_banner">
		                
		            </div>
		            <div class="email_body">
		                <h1 class="text-center"> Query Message</h1>
		                <b>{{$name}}</b></br>
		                <b>( {{$phone}} )</b>
		                <p>
		                    {{$msg}}
		                </p>
		                
		                </div>
		            </div>
		        </div>
		        
	</div>
</div>