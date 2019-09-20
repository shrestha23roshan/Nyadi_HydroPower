<div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                     <div class="foot-contents">
                        <h2><b>Head Office</b></h2>
                        <h3>{{ $setting->site_name }}</h3>
                        <p>{{ $setting->site_address }}</p>
                        <p><b>P.O.BOX :</b>  {{ $setting->site_pobox }}</p>
                        <p><b>Phone :</b>  {{ $setting->site_phone }}</p>
                        <p><b>Email :</b> <a href="mailto:nhl@nhl.com.np">  {{ $setting->site_email }}</a></p>
                    </div>
                </div>
                 <div class="col-sm-3">
                    <div class="foot-contents">
                        <h2><b></b>SITE OFFICE</b></h2>
                        <h3>Nyadi Hydropower Project</h3>
                        <p>Bahundanda 6, Marshyangdi Rural municipality, Lamjung, Nepal</p>
                        <p><b>P.O.BOX :</b>26305</p>
                        <p><b>Email :</b> <a href="mailto:nhl@nhl.com.np">  {{ $setting->site_email }}</a></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="foot-contents">
                        <h2>Location Map</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1766.4714423798475!2d85.3272676597914!3d27.688160103668995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bbe2d2973b%3A0x14f3e6630e80f740!2sButwal+Power+Co.+Ltd.!5e0!3m2!1sen!2snp!4v1563089713107!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.180949610312!2d84.41882801691995!3d28.32714640565584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDE5JzM3LjciTiA4NMKwMjUnMTUuNyJF!5e0!3m2!1sen!2snp!4v1567593836192!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>               
                    </div>
                </div>
            </div>
        </div>
		</div>
		<div class="copyrights">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<span>&copy; 2019 NHL All Right Reserved.</span>
					</div>
					<div class="col-sm-6" align="right">
                        <a href="{{ $setting->facebook_url }}" target="_blank">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="{{ $setting->twitter_url }}" target="_blank">
							<i class="fa fa-twitter"></i>
						</a>
						<a href="{{ $setting->instagram_url }}" target="_blank">
							<i class="fa fa-instagram"></i>
						</a>
						<a href="{{ $setting->linkedin_url }}" target="_blank">
							<i class="fa fa-linkedin"></i>
						</a>
					</div>
				</div>
			</div>
		</div>	
	</div>


	<a title="Go to Top" href="#" class="scrollToTop" style="width: 30px; height: 30px; line-height:25px; text-align: center; background: rgb(17, 68, 85); color: rgb(255, 255, 255); position: fixed; bottom:50px; right: 10px; border-radius: 100%; display: none;"><i class="fa fa-chevron-up"></i></a>							
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
    <script src="js/overlay.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="costom-gallery/js/lightgallery-all.min.js"></script>
    <script src="js/main.js"></script>
    <script>
    $( function() {
        $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
        $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    } );
  </script>
  <script type="text/javascript">
	$(document).ready(function(){
	    $('#lightgallery').lightGallery();
	});
    </script>