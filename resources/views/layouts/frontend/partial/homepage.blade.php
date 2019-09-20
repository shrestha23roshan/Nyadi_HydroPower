<!-- About Us Start---->	
@if ($companyProfile)
	<div class="home-about-contents">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="introduction">
						<h2>Welcome to Nyadi Hyropower Limited</h2>
						<p>{!! $companyProfile->description !!} </p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
<!--About Us End ----------------------------------->

<div class="homepages-contentss">
	<div class="container">
		<div class="row">
		<div class="col-sm-6">
				<div class="gallery-section">
					<h2>GALLERY</h2>
					<div class="owl-carousel owl-theme home-gallerry">
						<div class="item">
							<div class="gallery-box">
								<a href="{{ route('image-gallery.album') }}">
									<div class="g-images">
										<img src="img/project.jpg" alt="Gallery">
									</div>
									<h4>Projects</h4>
								</a>
							</div>
						</div>
						<div class="item">
							<div class="gallery-box">
								<a href="{{ route('image-gallery.album1') }}">
									<div class="g-images">
										<img src="img/csr.jpg" alt="Gallery">
									</div>
									<h4>CSR</h4>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="news-section">
					<h2>NEWS AND UPDATED</h2>
					<div class="news-box">
					
						<marquee scrollamount="2" scrolldelay="10" onmouseover="this.stop();" onmouseout="this.start();" direction="up">
						        @foreach ($news as $news)
								<li><strong><a href="{{ route('news.show', $news->id) }}">{{ $news->heading }}</a></strong></li>
						    <!--<li><strong><a href="#">Electrician training for the project affected locals</a></strong></li>-->
						    <!--<li><strong><a href="#">Project Progress as of September 2017</a></strong></li>-->
						    	@endforeach
						 </marquee>
						<!-- <a class="btns right" href="#">Read More</a>		 -->
					
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

 <!--popup------------------------>
<?php
$i = 0;
$j = 1;
$pop = count($popup);
foreach ($popup as $pcs){
?>
	<div class="overlay-bg"></div>
	
    <div class="overlay-content popup<?php echo $j; ?>">
			<a href="#" title="{{ $pcs->title }}">
				<img src="{{ asset('uploads/popup/'.$pcs->attachment) }}" width="750px" alt="Nyadi Hydropower" title="Nyadi Hydropower" />
			</a>
        	<button class="close-btn" id="<?php echo $j != $pop ? ($j + 1) : ''; ?>"
                data-showpopup="<?php echo $j != $pop ? ($j + 1) : ''; ?>">X
        	</button>
    </div>
    <?php
    $i++;
    $j++;
}
?>

