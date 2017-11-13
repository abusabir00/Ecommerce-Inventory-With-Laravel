@extends('frontEnd.master')

@section('title')
About Us
@endsection

@section('content')


<!-- mt main start here -->
<main id="mt-main">

	<section class="mt-about-sec wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="txt">
                  <h2>About Us</h2>
                  <p><?php $about->aboutUs ?></p>
                </div>
                <div class="mt-follow-holder">
                  <span class="title">Follow Us</span>
                  <!-- Social Network of the Page -->
                  <ul class="list-unstyled social-network">
                    <li><a href="{{$general->facebook}}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{$general->google}}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{$general->twitter}}"><i class="fa fa-google-plus"></i></a></li>
                  </ul>
                  <!-- Social Network of the Page end -->
                </div>
              </div>
            </div>
          </div>
        </section>

</main><!-- mt main end here -->


@endsection
