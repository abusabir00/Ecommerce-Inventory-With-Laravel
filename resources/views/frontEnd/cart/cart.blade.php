@extends('frontEnd.master')

@section('title')
Cart Page
@endsection

@section('content')

<?php $cartValue = Cart::content(); $vat = DB::table('comsetting')->select('vat')->first();  ?>


<!-- mt main start here -->
<main id="mt-main">



@if(Session::get('message'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">×</button> 
<strong>{{ Session::get('message') }}</strong>
</div>
@endif  


    
        <!-- Mt Product Table of the Page -->
        <div class="mt-product-table wow fadeInUp" data-wow-delay="0.4s">
          <div class="container">
            <div class="row border">
              <div class="col-xs-12 col-sm-6">
                <strong class="title">PRODUCT</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">PRICE</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">QUANTITY</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="title">TOTAL</strong>
              </div>
            </div>
            @foreach($cartValue as $cart)
            <div class="row border">
              <div class="col-xs-12 col-sm-2">
                <div class="img-holder">
                  <img src="{{url('/public/admin/upload/product/'.$cart->options->pId  . '/'. $cart->options->photo)}}" alt="image description" height="105" width="105">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <strong class="product-name">{{$cart->name}}</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="price">TK. {{number_format($cart->price,2)}}</strong>
              </div>
              <div class="col-xs-12 col-sm-2">
              <strong class="price"></i>{{$cart->qty}}</strong>
               <!--  <form action="#" class="qyt-form">
                  <fieldset>
                    <select>
                      <option <?php if($cart->qty == 1){ echo 'selected';} ?> value="1">1</option>
                      <option <?php if($cart->qty == 2){ echo 'selected';} ?> value="2">2</option>
                      <option <?php if($cart->qty == 3){ echo 'selected';} ?>  value="3">3</option>
                      <option <?php if($cart->qty == 4){ echo 'selected';} ?>  value="4">4</option>
                      <option <?php if($cart->qty == 5){ echo 'selected';} ?>  value="5">5</option>
                    </select>
                  </fieldset>
                </form> -->
              </div>
              <div class="col-xs-12 col-sm-2">
                <strong class="price">TK. </i>{{ number_format(($cart->qty * $cart->price),2)}}</strong>
                <a href="{{url('/delCartRow/'.$cart->rowId)}}"><i class="fa fa-close"></i></a>
              </div>
            </div>
            @endforeach
<?php 
$vat = $vat->vat; 
$subTot = str_replace(',','',(Cart::subtotal()));
$vatAmount = ($subTot*$vat)/100;
$total = ($subTot+$vatAmount);
?>



          </div>
        </div><!-- Mt Product Table of the Page end -->
        <!-- Mt Detail Section of the Page -->
        <section class="mt-detail-sec style1 wow fadeInUp" data-wow-delay="0.4s">
          <div class="container">
            <div class="row">

              <div class="col-xs-12 col-sm-12 ">
                <ul class="list-unstyled block cart">
                  <li>
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">CART SUBTOTAL</strong>
                      <div class="txt pull-right">
                        <span>TK. {{number_format($subTot,2)}}</span>
                      </div>
                    </div>
                  </li>

                  <li>
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">PRODUCT VAT</strong>
                      <div class="txt pull-right">
                        <span> {{$vat}} % </span>
                      </div>
                    </div>
                  </li>

                  <li style="border-bottom: none;">
                      
                    <div class="txt-holder">
                      <strong class="title sub-title pull-left">CART TOTAL</strong>
                      <div class="txt pull-right">
                        <span>TK. </i>{{number_format($total,2)}}</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>



@if(!Session::get('cusId'))
               <div class="col-xs-12 col-sm-6">
                <h2>NEW CUSTOMER DETAILS</h2>
                <!-- Bill Detail of the Page -->
                  {!! Form::open(['url' => '/storeCustomer','method' => 'POST', 'class' => '','enctype'=>'multipart/form-data']) !!}
                  <fieldset>
                    <div class="form-group">
                      <select class="form-control" name="country">
                        <option value="Bangladeh">Bangladeh</option>
                      </select>
                    </div>
                    <div class="form-group">
                        {{ Form::text('fname',null, array_merge(['class' => 'form-control','placeholder'=>'First Name*'])) }}
                        <span class="text-danger">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</span>
                      </div>
                      <div class="form-group">
                        {{ Form::text('lname',null, array_merge(['class' => 'form-control','placeholder'=>'Last Name'])) }}
                        <span class="text-danger">{{ $errors->has('lname') ? $errors->first('lname') : '' }}</span>
                      </div>
                    <div class="form-group">
                        {{ Form::text('pass',null, array_merge(['class' => 'form-control','placeholder'=>'Type Password'])) }}
                        <span class="text-danger">{{ $errors->has('pass') ? $errors->first('pass') : '' }}</span>
                      </div>
                      <div class="form-group">
                        {{ Form::text('repass',null, array_merge(['class' => 'form-control','placeholder'=>'Re-Type Password'])) }}
                        <span class="text-danger">{{ $errors->has('repass') ? $errors->first('repass') : '' }}</span>
                      </div>
                    <div class="form-group">
                      {{ Form::text('cname',null, array_merge(['class' => 'form-control','placeholder'=>'Company Name'])) }}
                      <span class="text-danger">{{ $errors->has('cname') ? $errors->first('cname') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('addr1',null, array_merge(['class' => 'form-control','placeholder'=>'Present Address*'])) }}
                      <span class="text-danger">{{ $errors->has('addr1') ? $errors->first('addr1') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('addr2',null, array_merge(['class' => 'form-control','placeholder'=>'Permanent Address'])) }}
                      <span class="text-danger">{{ $errors->has('addr2') ? $errors->first('addr2') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::text('city',null, array_merge(['class' => 'form-control','placeholder'=>'Town / City*'])) }}
                      <span class="text-danger">{{ $errors->has('city') ? $errors->first('city') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::text('postCode',null, array_merge(['class' => 'form-control','placeholder'=>'Post Code'])) }}
                      <span class="text-danger">{{ $errors->has('postCode') ? $errors->first('postCode') : '' }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::email('email',null, array_merge(['class' => 'form-control','placeholder'=>'Email Address*'])) }}
                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                      </div>
                    <div class="form-group">
                        {{ Form::number('phone',null, array_merge(['class' => 'form-control','placeholder'=>'Phone Number*'])) }}
                        <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                      </div>
                    <div class="form-group">
                      <input type="checkbox" name="diffrentAddr" value="1"> Shipping same as billing address?
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('shippingAddr',null, array_merge(['class' => 'form-control','placeholder'=>'Diffrent Shipping Address'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::date('date',null, array_merge(['class' => 'form-control','placeholder'=>'yyyy-mm-dd'])) }}
                      <span class="text-danger">{{ $errors->has('date') ? $errors->first('date') : '' }}</span>
                    </div>
                    {{ Form::hidden('amount',$subTot) }}
                    <button type="submit" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
                  </fieldset>
                {!! Form::close() !!}
                <!-- Bill Detail of the Page end -->
              </div>

@else
<?php $cusVal = DB::table('customer')->where('id',Session::get('cusId'))->first(); ?>

              <div class="col-xs-12 col-sm-12">
                <h2>YOUR ACCOUNT DETAILS</h2>
                <!-- Bill Detail of the Page -->
                  {!! Form::open(['url' => '/storeCustomer','method' => 'POST', 'class' => '','enctype'=>'multipart/form-data']) !!}
                  <fieldset>
                    <div class="form-group">
                      {{ Form::text('country',$cusVal->country, array_merge(['class' => 'form-control','placeholder'=>'First Name*','readonly'])) }}
                      <span class="text-danger">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::text('fname',$cusVal->fname, array_merge(['class' => 'form-control','placeholder'=>'First Name*','readonly'])) }}
                        <span class="text-danger">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</span>
                      </div>
                      <div class="form-group">
                        {{ Form::text('lname',$cusVal->lname, array_merge(['class' => 'form-control','placeholder'=>'Last Name','readonly'])) }}
                        <span class="text-danger">{{ $errors->has('lname') ? $errors->first('lname') : '' }}</span>
                      </div>

                    <div class="form-group">
                      {{ Form::text('cname',$cusVal->cname, array_merge(['class' => 'form-control','placeholder'=>'Company Name','readonly'])) }}
                      <span class="text-danger">{{ $errors->has('cname') ? $errors->first('cname') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('addr1',$cusVal->addr1, array_merge(['class' => 'form-control','placeholder'=>'Address 1*','readonly'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('addr2',$cusVal->addr2, array_merge(['class' => 'form-control','placeholder'=>'Address 2','readonly'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::text('city',$cusVal->city, array_merge(['class' => 'form-control','placeholder'=>'Town / City*','readonly'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::text('postCode',$cusVal->postCode, array_merge(['class' => 'form-control','placeholder'=>'Post Code','readonly'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    <div class="form-group">
                        {{ Form::email('email',$cusVal->email, array_merge(['class' => 'form-control','placeholder'=>'Email Address*','readonly'])) }}
                        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                      </div>
                    <div class="form-group">
                        {{ Form::number('phone',$cusVal->phone, array_merge(['class' => 'form-control','placeholder'=>'Phone Number*','readonly'])) }}
                        <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                      </div>
                    <div class="form-group">
                      <input type="checkbox" name="sameAddr" value="1" id="isDiff" onclick="main();"> Shipping same as billing address?
                    </div>
                    <div class="form-group">
                      {{ Form::textarea('shippingAddr',null, array_merge(['class' => 'form-control','placeholder'=>'Diffrent Shipping Address','id'=>'diff'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    <div class="form-group">
                      {{ Form::date('date',null, array_merge(['class' => 'form-control','placeholder'=>'Delivery Date'])) }}
                      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
                    </div>
                    {{ Form::hidden('amount',$subTot) }}
                    <button type="submit" class="process-btn">PROCEED TO CHECKOUT <i class="fa fa-check"></i></button>
                  </fieldset>
                {!! Form::close() !!}
                <!-- Bill Detail of the Page end -->
              </div>
@endif 

@if(!Session::get('cusId'))

              <div class="col-xs-12 col-sm-6">
                <h2>EXISTING USER</h2>
                <!-- Bill Detail of the Page -->
                  {!! Form::open(['url' => '/customerLogin','method' => 'POST', 'class' => '','enctype'=>'multipart/form-data']) !!}
                  <fieldset>
                    
                    <div class="form-group">
                      {{ Form::email('customer_email',null, array_merge(['class' => 'form-control','placeholder'=>'User Email'])) }}
                      <span class="text-danger">{{ $errors->has('customer_email') ? $errors->first('customer_email') : '' }}</span>
                    </div>

                    <div class="form-group">
                      {{ Form::text('customer_pass',null, array_merge(['class' => 'form-control','placeholder'=>'User Password'])) }}
                    </div>
                    <button type="submit" class="btn-type1">Login</button>
                  </fieldset>
                {!! Form::close() !!}
                <!-- Bill Detail of the Page end -->
              </div>
@endif

                
            </div>
        </section>
        <!-- Mt Detail Section of the Page end -->
              </div>
            </div>
          </div>
        </section>
</main><!-- mt main end here -->


@endsection




@section('js') 
<script type="text/javascript">
$('#isDiff').click(function(){
     
    if($(this).attr('checked') == false){ alert('2222');
         $('#diff').attr("disabled","disabled");   
    }
    else {
        $('#diff').removeAttr('disabled');
    }
});
</script>
@endsection 