<?php 
$cart = Cart::content();  
$general = DB::table('comsetting')->select('phone','email','facebook','google','twitter','download')->first();
?>
    <!-- mt header style7 start here -->
    <header id="mt-header" class="style7">
        <!-- mt-top-bar start here -->
        <div class="mt-top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 hidden-xs">
                        <span class="tel"> <i class="fa fa-phone" ></i> {{$general->phone}}</span>
                        <a class="tel"> <i class="fa fa-envelope-o" ></i>{{$general->email}}</a>
                    </div>

                    <div class="col-xs-12 col-sm-7 text-right">
                        <!-- mt-top-list start here -->
                        <ul class="mt-top-list">
                            
                            <li>
                              <ul class="list-unstyled social-network">
                                <li style="margin-right: -20px;"><a href="{{$general->facebook}}" style="color:#627AAC;"><i class="fa fa-facebook"></i></a></li>
                                <li style="margin-right: -20px;"><a href="{{$general->google}}" style="color:#E36E60;"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{$general->twitter}}" style="color:#566B81;"><i class="fa fa-twitter"></i></a></li>
                              </ul>
                            </li>

                            <li><a href="{{url('/')}}">Home</a></li>
                           
                            <li><div class="dropdown show">
                              <a class="dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About Us
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{url('/aboutUs')}}" style="font-size: 10px;">About US</a>
                                <a class="dropdown-item" href="{{url('/mission&vission')}}" style="font-size: 10px;">Vission & Mission</a>
                                <a class="dropdown-item" href="{{url('/message')}}" style="font-size: 10px;">Messege</a>
                              </div>
                            </div>
                            </li>
                            <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            <li><a href="{{$general->download}}">Download</a></li>
                            <li><div class="round hollow text-center">
        <a href="#" class="" id="addClass"> Live Chat</a>
        </div></li>
                            @if(Session::get('cusId'))<li><a href="{{url('/customerLogout')}}">Logout</a></li>@endif	
                        </ul><!-- mt-top-list end here -->
                    </div>
                </div>
            </div>
        </div><!-- mt-top-bar end here -->
        <!-- mt-bottom-bar start here -->
        <div class="mt-bottom-bar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="mt-logo"><a href="{{url('/')}}"><img src="{{asset('/public/admin/upload/logo/minLogo.png')}}" alt="schon"></a><p style="color: #000;font-size:15px;font-weight:bold; ">Furnishing-Decor & More</p></div>


                        <!-- mt-icon-list start here -->
                        <ul class="mt-icon-list">

                            <li class="drop">
                                <a href="#" class="cart-opener">
                                    <span class="icon-handbag"></span>
                                    <span class="num">{{ $cart->count() }}</span>
                                </a>
                                <!-- mt drop start here -->
                                <div class="mt-drop">
                                    <!-- mt drop sub start here -->
                                    <div class="mt-drop-sub">
                                        <!-- mt side widget start here -->
                                        <div class="mt-side-widget">


                                            @foreach($cart as $val)
											<!-- cart row start here -->
											<div class="cart-row">
												<a href="#" class="img"><img src="{{url('/public/admin/upload/product/'.$val->options->pId  . '/'. $val->options->photo)}}" alt="image description" height="75" width="75"></a>
												<div class="mt-h">
													<span class="mt-h-title"><a href="#">{{$val->name}}</a></span>
													<span class="price">TK. {{$val->price}}</span>
													<span class="mt-h-title">Qty: {{$val->qty}}</span>
												</div>
												<a href="{{url('/delCartRow/'. $val->rowId)}}" class="close fa fa-times"></a>
											</div><!-- cart row end here -->
											@endforeach

                                            <!-- cart row total start here -->
                                            <div class="cart-row-total">
                                                <span class="mt-total">Sub Total</span>
                                                <span class="mt-total-txt">TK. {{Cart::subtotal()}}</span>
                                            </div>
                                            <!-- cart row total end here -->
                                            <div class="cart-btn-row">
                                                <a href="{{url('/cart')}}" class="btn-type2">VIEW CART</a>
                                                <a href="{{url('/cart')}}" class="btn-type3">CHECKOUT</a>
                                            </div>
                                        </div><!-- mt side widget end here -->
                                    </div>
                                    <!-- mt drop sub end here -->
                                </div><!-- mt drop end here -->
                                <span class="mt-mdropover"></span>
                            </li>
                            <li class="hidden-lg hidden-md">
                                <a class="bar-opener mobile-toggle" href="#">
                                    <span class="bar"></span>
                                    <span class="bar small"></span>
                                    <span class="bar"></span>
                                </a>
                            </li>
                        </ul><!-- mt-icon-list end here -->




                        <!-- navigation start here -->
                        <nav id="nav">
                            <ul>

                            	@foreach($catValue as $value)
                                <li>
                                    <a class="drop-link" href="homepage1.html">@if($value->parent == 0){{$value->name}}@endif<i class="fa fa-angle-down hidden-lg hidden-md" aria-hidden="true"></i></a>
                                    <div class="s-drop">
                                        <ul>
                                        	<?php $catValue = DB::table('categorie')
                                        	->where('parent',$value->id)->get();  ?>
											@foreach($catValue as $val)
                                            <li><a href="{{url('/productByCat/'.$val->id)}}">{{$val->name}}</a></li>
               								@endforeach	
                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </nav><!-- navigation end here -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mt main start here -->
