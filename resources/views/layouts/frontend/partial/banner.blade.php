<div class="main-banner">
	<div class="owl-carousel owl-theme banner">
		@if (count($banners) > 0)
            <?php $count = 1; ?>
            @if( count($banners) > 0)
                @foreach($banners as $banner)
                    @if(file_exists('uploads/media-management/banners/'.$banner->attachment) && $banner->attachment != '')
                        <div class="item" style="background-image: url({{ asset('uploads/media-management/banners/'.$banner->attachment) }})">
                        </div>
                    @endif
                    <?php $count++; ?>
                @endforeach
             @endif
        @endif
	</div>
</div>