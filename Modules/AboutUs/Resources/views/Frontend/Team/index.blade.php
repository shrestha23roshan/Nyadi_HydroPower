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
                        <h2>NHL Team</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javascript:void(0)">About</a></li>
                                <li class="active"><a href="javascript:void(0)">NHL Team</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    <div class="row" id="tabs">
                        <div class="col-sm-3">
                            <div class="aside">
                                <ul>
                                    @foreach ($teams as $team)
                                        <li>
                                            <a href="#tabs-{{ $team->id}}">
                                            @if (file_exists('uploads/aboutus/teams/'.$team->attachment) && $team->attachment !='')
                                                <img src="{{ asset('uploads/aboutus/teams/'.$team->attachment) }}">
                                            @endif
                                            <span>
                                                <b>{{ $team->name }}</b>
                                                <i>{{ $team->post }}</i>
                                            </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            @foreach ($teams as $team)
                                <div id="tabs-{{ $team->id }}">
                                    @if (file_exists('uploads/aboutus/teams/'.$team->attachment) && $team->attachment !='')
                                        <img src="{{ asset('uploads/aboutus/teams/'.$team->attachment) }}">
                                    @endif
                                    <h2>{{ $team->name }}</h2>
                                    <h3>{{ $team->post }}</h3>
                                    <p>{!! $team->description !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>




        @include('layouts.frontend.partial.footer')
    </body>
</html>