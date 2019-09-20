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
                                <li><a href="{{ route('image-gallery.index') }}">Photos</a></li>
                                <li class="active"><a href="javacript:void(0)">Project Images</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                   <div class="row">
                       @foreach($albums as $album)
                       <div class="col-sm-2">
                            <div class="gallery-box gallery-bg">
                                    <a href="{{ route('image-gallery.album.photo',['slug' => $album->slug]) }}">
                                    <div class="g-images">
                                        @if (file_exists('uploads/media-management/album/'.$album->attachment) && $album->attachment !='')
                                            <img src="{{asset('uploads/media-management/album/'.$album->attachment) }}">
                                        @endif
                                    </div>
                                    <h4>{{$album->name}}</h4>
                                </a>
                            </div>
                        </div>
                        @endforeach
                   </div>
                </div>
            </div>
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>