@extends('frontEnd.master')

@section('title')
Contact Us
@endsection

@section('content')

<main id="mt-main">
@if(Session::get('message'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">×</button> 
<strong>{{ Session::get('message') }}</strong>
</div>
@endif
	<div class="mt-contact-detail wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
                <div id="googleMap" style="width:100%;height:400px;"></div>
              </div>	

              <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
                <span class="icon"><i class="fa fa-map-marker"></i></span>
                <strong class="title">ADDRESS</strong>
                <address>8/12, Pallabi(Kajioffice) <br>Mirpur11.5, Dhaka-1216</address>
              </div>
              
              <div class="col-xs-12 col-sm-4 mt-paddingbottomxs text-center">
                                <!-- Bill Detail of the Page -->
                  {!! Form::open(['url' => '/cusMsg','method' => 'POST', 'class' => '','enctype'=>'multipart/form-data']) !!}
                  <fieldset>
                    <div class="form-group">
                        {{ Form::text('name',null, array_merge(['class' => 'form-control','placeholder'=>'Enter Name'])) }}
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                      </div>
                      <div class="form-group">
                        {{ Form::text('subject',null, array_merge(['class' => 'form-control','placeholder'=>'Enter subject'])) }}
                        <span class="text-danger">{{ $errors->has('subject') ? $errors->first('subject') : '' }}</span>
                      </div>
                       <div class="form-group">
                        {{ Form::text('phone',null, array_merge(['class' => 'form-control','placeholder'=>'Enter Phone'])) }}
                        <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                      </div>
                    <div class="form-group">
                      {{ Form::textarea('msg',null, array_merge(['class' => 'form-control','placeholder'=>'Message'])) }}
                      <span class="text-danger">{{ $errors->has('msg') ? $errors->first('msg') : '' }}</span>
                    </div>

                    {{ Form::hidden('amount',Cart::subtotal()) }}
                    <button type="submit" class="btn btn-default pull-left">Submit</button>
                  </fieldset>
                {!! Form::close() !!}
                <!-- Bill Detail of the Page end -->
              </div>

            </div>
          </div>
        </div>

</main><!-- Main of the Page end here -->  
@endsection 


@section('js')

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3rGvBtUBwVAAzn4lr04k-KXCGwLV4Xy4&callback=myMap"
  type="text/javascript"></script>  
@endsection 