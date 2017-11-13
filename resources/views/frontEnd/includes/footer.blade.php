<style type="text/css">
.fond{position:absolute;padding-top:85px;top:0;left:0; right:0;bottom:0;
 background-color:#00506b;}

.style_prevu_kit
{
    display:inline-block;
    border:0;
    width:196px;
    height:210px;
    position: relative;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1); 
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1); 
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1);
    transition: all 200ms ease-in;
    transform: scale(1);   

}
.style_prevu_kit:hover
{
    box-shadow: 0px 0px 150px #000000;
    z-index: 2;
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(1.5);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(1.5);   
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(1.5);
    transition: all 200ms ease-in;
    transform: scale(1.5);
}



/* Outer */
.popup {
    width:100%;
    height:100%;
    display:none;
    position:fixed;
    top:0px;
    left:0px;
    background:rgba(0,0,0,0.75);
}
 
/* Inner */
.popup-inner {
    max-width:700px;
    width:90%;
    padding:40px;
    position:absolute;
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
    box-shadow:0px 2px 6px rgba(0,0,0,1);
    border-radius:3px;
    background:#fff;
}
 
/* Close Button */
.popup-close {
    width:30px;
    height:30px;
    padding-top:4px;
    display:inline-block;
    position:absolute;
    top:0px;
    right:0px;
    transition:ease 0.25s all;
    -webkit-transform:translate(50%, -50%);
    transform:translate(50%, -50%);
    border-radius:1000px;
    background:rgba(0,0,0,0.8);
    font-family:Arial, Sans-Serif;
    font-size:20px;
    text-align:center;
    line-height:100%;
    color:#fff;
}
 
.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
    text-decoration:none;
}
/* Outer */
.popup {
    background:rgba(0,0,0,0.75);
}
/* Inner */
.popup-inner {
    position:absolute;
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
}

/* Close Button */
.popup-close {
    transition:ease 0.25s all;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(50%, -50%);
}
.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
}	
</style>			

			<!-- footer of the Page -->
			<footer id="mt-footer" class="style1 wow fadeInUp" data-wow-delay="0.4s">


				<!-- Footer Area of the Page -->
				<div class="footer-area dark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<p>©<a href="{{url('/')}}">HERON'Z</a> -Furnishing-Decor & More </p>
							</div>
							<div class="col-xs-12 col-sm-6 text-right">
								<div class="bank-card">
									<a href="{{url('/offer')}}" data-toggle="modal"><div class="style_prevu_kit" style="background-image:url('/herons/public/admin/upload/logo/new_sticker.png');border-radius: 50%; width:35px;height:35px">   
                              </div> </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Footer Area of the Page end -->
			</footer><!-- footer of the Page end -->

<script type="text/javascript">

</script>
