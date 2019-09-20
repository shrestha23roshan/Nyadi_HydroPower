{{-- @php
    dd($albumPhotos);   
@endphp --}}
<!DOCTYPE html>
<html>
<head>
    @section('title', $seo->meta_title)

    @include('layouts.frontend.partial.head') 
</head>
<body>
        @include('layouts.frontend.partial.header') 
        <div class="inside-content-wrapper">
            <div class="inside-bg-images" style="background-image:url(img/inside.jpg)"></div>
            <div class="container">
                <div class="inside-title">
                    <div class="row">
                        <div class="col-sm-6">
                        <h2>Photos</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javacript:void(0)">Gallery</a></li>
                                <li><a href="{{ route('image-gallery.album') }}">Photos</a></li>
                                <li class="active"><a href="javacript:void(0)">Images</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                <div id="lightgallery" class="list-unstyled row">
                    @foreach ($albumPhotos as $albumPhoto)
                    <div class="col-sm-4 col-lg-2 g-box lazy" data-responsive="{{asset('uploads/media-management/album/photos/'.$albumPhoto->attachment) }}" data-src="{{asset('uploads/media-management/album/photos/'.$albumPhoto->attachment) }}">
                        @if (file_exists('uploads/media-management/album/photos/'.$albumPhoto->attachment) && $albumPhoto->attachment !='')
                        <a href="">    
                            <img class="img-responsive" src="{{asset('uploads/media-management/album/photos/'.$albumPhoto->attachment) }}">
                        </a>
                        @endif
                    </div>
                    @endforeach
                   
				</div>
                </div>
            </div>
        </div>
        @include('layouts.frontend.partial.footer') 
    </body>
</html>