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
                        <h2>Nyadi Hydropower Project</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javacript:void(0)">Projects</a></li>
                                <li class="active"><a href="javacript:void(0)">NHL Project</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    @foreach ($nhps as $nhp)
                        <h3>{{ $nhp->title}}</h3>
                        <p>{!! $nhp->description !!}</p>
                    @endforeach
                   
                </div>
            </div>
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>