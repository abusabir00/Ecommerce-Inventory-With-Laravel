
<main id="mt-main">

<section class="section-white">
  <div class="container">
<div class="" style="position: absolute;right: 15%; z-index: 10;top: 170px;">
<h2 style="color:#000;">Thin<span style="color:red;">k</span> Artistic</h2>
</div>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
      <?php $i=1;?>
      	@foreach($slider as $val)
        <div class="item <?php if($i==1){ echo 'active';} $i++; ?>" >
          <img src="{{ $val->photo }}" alt="..." >
          <div class="carousel-caption">
            <h2 style=""></h2>
          </div>
        </div>
        @endforeach

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

  </div>
</section>

</main>



						<div class="container" style="padding: 15px 0px 15px 0px;">
				            <div class="row">

				              <div class="col-xs-6 col-sm-2 mt-paddingbottomxs text-center num">
				              <a data-toggle="modal" data-target="#myModal"><div class="style_prevu_kit" style="background-image:url('/public/frontEnd/images/75x75.png');border-radius: 50%; width:75px;height:75px">	
				              </div></a>    
				              </div>

				              <div class="col-xs-6 col-sm-2 mt-paddingbottomxs text-center num">
				              <a data-toggle="modal" data-target="#myModal"><div class="style_prevu_kit" style="background-image:url('/public/frontEnd/images/75x75.png');border-radius: 50%; width:75px;height:75px">	
				              </div></a>    
				              </div>

				              <div class="col-xs-6 col-sm-2 mt-paddingbottomxs text-center num">
				              <a data-toggle="modal" data-target="#myModal"><div class="style_prevu_kit" style="background-image:url('/public/frontEnd/images/75x75.png');border-radius: 50%; width:75px;height:75px">	
				              </div> </a>   
				              </div>

				              <div class="col-xs-6 col-sm-2 mt-paddingbottomxs text-center num">
				              <a data-toggle="modal" data-target="#myModal"><div class="style_prevu_kit" style="background-image:url('/public/frontEnd/images/75x75.png');border-radius: 50%; width:75px;height:75px">	
				              </div></a>    
				              </div>

				              <div class="col-xs-6 col-sm-2 mt-paddingbottomxs text-center num">
				              <a data-toggle="modal" data-target="#myModal"><div class="style_prevu_kit" style="background-image:url('/public/frontEnd/images/75x75.png');border-radius: 50%; width:75px;height:75px">	
				              </div> </a>   
				              </div>

				              <div class="col-xs-6 col-sm-2 mt-paddingbottomxs text-center num">
				              <a data-toggle="modal" data-target="#myModal"><div class="style_prevu_kit" style="background-image:url('/public/frontEnd/images/75x75.png');border-radius: 50%; width:75px;height:75px">	
				              </div> </a>   
				              </div>

				              <p style="margin-left: 30px;">
				              <a href="{{url('/environment/policy')}}">Environment Policy</a> | <a href="{{url('/quality/policy')}}">Quality policy</a> | <a href="{{url('/interior')}}" rel="nofollow">Interior</a> 
				              </p>


				            </div>
				          </div>






<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>  
