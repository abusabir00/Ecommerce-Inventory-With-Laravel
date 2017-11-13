@extends('frontEnd.master')

@section('title')
Product Page
@endsection

@section('content')

<!-- mt main start here -->
<main id="mt-main">

	<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <!-- mt productlisthold start here -->
					<ul class="mt-productlisthold list-inline">

					@foreach($product as $value)
						<li style="border: 2px solid #e0c4c4; margin-bottom: 8px;margin-right: 8px;">
							<!-- mt product1 large start here -->
							<div class="mt-product1 large">
								<div class="box">
									<div class="b1">
										<div class="b2">
										<?php $img = unserialize($value->photo); $newPrice = explode(',',$value->newPrice);?>
											<a href="{{url('/singleProduct/'.$value->id)}}"><img src="{{asset('/public/admin/upload/product/'. $value->id . '/'. $img[0])}}" alt="image description" ></a>
											
											<ul class="links">
												<li><a href="{{url('/singleProduct/'.$value->id)}}">{{$value->name}}</a></li>
												<li><a href="#">TK. {{number_format($newPrice[0],2)}}</i></a></li>
											</ul>
										</div>
									</div>
								</div>

							</div><!-- mt product1 center end here -->
						</li>
					@endforeach	

					</ul><!-- mt productlisthold end here -->
					<!-- mt pagination start here -->
					<nav class="mt-pagination">
					{{$product->links()}}
					</nav><!-- mt pagination end here -->
            </div>
          </div>
        </section>
</main><!-- mt main end here -->

<style type="text/css">
.box:hover {
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>

@endsection

@section('pcss')
<style type="text/css">
.box:hover img {
  -moz-transform: scale(1.1);
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
@endsection