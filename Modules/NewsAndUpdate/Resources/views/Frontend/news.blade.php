@php
    // dd($news);   
@endphp
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
                        <h2>News</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javacript:void(0)">News</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    {{-- {{$news}} --}}
                   
                        <h3>{{ $news->heading }}</h3>
                        <p>{!! $news->description !!}</p>
                     
                </div>
            </div>
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>