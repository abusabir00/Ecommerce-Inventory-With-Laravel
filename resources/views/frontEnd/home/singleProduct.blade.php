@extends('frontEnd.master')

@section('title')
Product Page
@endsection

@section('css')
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('public/admin/custom/zoom/css/style.css')}}">
<style type="text/css">
/* padding-bottom and top for image */
.mfp-no-margins img.mfp-img {
	padding: 0;
}
/* position of shadow behind the image */
.mfp-no-margins .mfp-figure:after {
	top: 0;
	bottom: 0;
}
/* padding for main container */
.mfp-no-margins .mfp-container {
	padding: 0;
}
</style>
@endsection

@section('content')
<main id="mt-main">
	<!-- Mt Product Detial of the Page -->
	<section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<!-- Slider of the Page -->
					<div class="slider">
						<!-- Comment List of the Page -->
						<ul class="list-unstyled comment-list">
							
						</ul>
						<!-- Product Slider of the Page -->
						<?php $images = unserialize($pro->photo); $proSize = explode(',',$pro->size); 
						$newPrice = explode(',',$pro->newPrice); $oldPrice = explode(',',$pro->oldPrice); ?>

						<div class="product-slider">
							@foreach($images as $img)
							<div class="slide">
								<img src="{{url('/public/admin/upload/product/'.$pro->id . '/'. $img)}}" id="myImg" alt="image description">
							</div>
							@endforeach
						</div>
						<!-- Product Slider of the Page end -->
						<!-- Pagg Slider of the Page -->
						<ul class="list-unstyled slick-slider pagg-slider">
						@foreach($images as $img)
							<li><div class="img"><img src="{{asset('/public/admin/upload/product/'.$pro->id . '/'. $img)}}" alt="image description"></div></li>
						@endforeach	
						</ul>
						<!-- Pagg Slider of the Page end -->
					</div>
					<!-- Slider of the Page end -->
					<!-- Detail Holder of the Page -->
					<div class="detial-holder">
						<h2>{{$pro->name}}</h2><hr>

						<div class="txt-wrap">
							<p><?php echo $pro->description; ?></p>
						</div>
						<div class="text-holder">
							<span class="price">TK. <span id="new">{{$newPrice[0]}}</span> @if($oldPrice[0]!=0)<span id="old"><del>{{$oldPrice[0]}}</del></span>@endif</span>
						</div>

						<!-- Product Form of the Page -->
						{!! Form::open(['url' => '/addToCart','method' => 'POST', 'class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}
						<div class="portlet-body form col-md-6">

							<div class="form-group">
					            <label>	Style No.</label>
					            <p><?php echo $pro->code; ?> </p>
					        </div>

					        <div class="form-group">
					            <label>Produc Size</label>
					        @if($pro->size!=null)     
					           <select class="form-control" name="size" onchange="setVal(this.value)">
					           @foreach($proSize as $key=>$size)
					                <option value="{{$key}}">{{$size}}</option>
					            @endforeach	    
					            </select>
					        @else
					        {{ Form::text('size','Standard', array_merge(['class' => 'form-control','readonly'])) }}
					        @endif    
					        </div>

					        <div class="form-group">
					            <label>Product Color</label>
					           <select class="form-control" name="color">
					               <option value="Natural">Natural</option>
				                   <option value="Antique Color">Antique Color</option>
				                   <option value="Dark Color">Dark Color</option>
					            </select>
					        </div>

					        <div class="form-group">
					            <label>Quantity* </label>
					            {{ Form::number('qty',1, array_merge(['class' => 'form-control'])) }}
    							<span class="text-danger">{{ Session::get('message') ? Session::get('message') : '' }}</span>
   
					        </div>
					         
					        
					       
							<div class="col-md-12">
								{{ Form::hidden('pId',$pro->id) }}
								{{ Form::hidden('photo',$images[0]) }}
							</div>
								<div class="row-val">
									<button type="submit" class="btn-type1">ADD TO CART</button>
								</div>
							</fieldset>
						{!! Form::close() !!}
						<!-- Product Form of the Page end -->
					</div>
					<!-- Detail Holder of the Page end -->
				</div>
			</div>
		</div>
	</section><!-- Mt Product Detial of the Page end -->
	<div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
	</div>

<a data-toggle="modal" data-target="#myModal">Link</a>	

</main><!-- mt main end here -->





<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 90%;
    max-width: 800px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>



<!-- The Modal -->
<div id="myModal" class="modal"><span class="close">&times;</span><img class="modal-content" id="img01">
 <div id="caption"></div>
</div>
<!-- /The Modal -->

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>










@endsection

@section('js')
<script type="text/javascript">
    function setVal(a){
    	var newPrice = <?php echo json_encode($newPrice); ?>;
    	var oldPrice = <?php echo json_encode($oldPrice); ?>;
    	var setNew = newPrice[a];
    	var setOld = oldPrice[a];

        document.getElementById("new").innerHTML="";
        document.getElementById("new").innerHTML= setNew;
        if(setOld !=00){
        document.getElementById("old").innerHTML="";
        document.getElementById("old").innerHTML='<del>'+setOld+'</del>'; }
    }
</script>

<script type="text/javascript">


</script>

@endsection