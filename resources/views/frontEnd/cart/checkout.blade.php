@extends('frontEnd.master')

@section('title')
Product Page
@endsection


@section('content')
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ url('public/admin/custom/zoom/css/style.css')}}">




  <!-- Mt Product Detial of the Page -->

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="bzoom_wrap">
                <ul id="bzoom">
                    <li>
                        <img class="bzoom_thumb_image" src="https://unsplash.it/375/500?image=201" title="first img" />
                        <img class="bzoom_big_image" src="https://unsplash.it/750/1000?image=201"/>
                    </li>
                    <li>
                        <img class="bzoom_thumb_image" src="https://unsplash.it/375/500?image=203"/>
                        <img class="bzoom_big_image" src="https://unsplash.it/750/1000?image=203"/>
                    </li>
                    <li>
                        <img class="bzoom_thumb_image" src="https://unsplash.it/375/500?image=212"/>
                        <img class="bzoom_big_image" src="https://unsplash.it/750/1000?image=212"/>
                    </li>
                    <li>
                        <img class="bzoom_thumb_image" src="https://unsplash.it/375/500?image=220"/>
                        <img class="bzoom_big_image" src="https://unsplash.it/750/1000?image=220"/>
                    </li>
                    <li>
                        <img class="bzoom_thumb_image" src="https://unsplash.it/375/500?image=223"/>
                        <img class="bzoom_big_image" src="https://unsplash.it/750/1000?image=223"/>
                    </li>
                </ul>
            </div>
          <!-- Detail Holder of the Page end -->
        </div>
      </div>
    </div>





<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{ url('public/admin/custom/zoom/js/jqzoom.js')}}"></script>
<script type="text/javascript">
$("#bzoom").zoom({
  zoom_area_width: 300,
    autoplay_interval :3000,
    small_thumbs : 4,
    autoplay : false
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

@endsection







