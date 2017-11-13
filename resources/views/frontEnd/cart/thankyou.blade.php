@extends('frontEnd.master')

@section('title')
Order Complete
@endsection

@section('content')


<!-- mt main start here -->
<main id="mt-main">

	<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="jumbotron text-xs-center">
				  <h1 class="display-3">Thank You!</h1>
				  <p class="lead"><strong>You Order Successfully Completed !</strong>  We Contact with you very soon.</p>
				  <hr>
				  <p>
				    Having trouble? <a href="{{url('/customerLogout')}}">Contact us</a>
				  </p>
				  <p class="lead">
				    <a class="btn btn-primary btn-sm" href="{{url('/')}}" role="button">Continue to homepage</a>
				  </p>
				</div>
              </div>
            </div>
          </div>
        </section>
</main><!-- mt main end here -->


@endsection