<!DOCTYPE html>
<html>
<head>
    @section('title', $seo->meta_title)

    @include('layouts.frontend.partial.head')</head>
<body>
    @include('layouts.frontend.partial.header')
    <div class="inside-content-wrapper">
            <div class="inside-bg-images" style="background-image:url(img/inside.jpg)"></div>
            <div class="container">
                <div class="inside-title">
                    <div class="row">
                        <div class="col-sm-6">
                        <h2>Board Of Director</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="javascript:void(0)">About</a></li>
                                <li class="active"><a href="javascript:void(0)">Board Of Director</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    <div class="row" id="tabs">
                        <div class="col-sm-3">
                            <div class="aside">
                                <ul>
                                    @foreach ($bods as $bod)
                                        <li><a href="#tabs-{{$bod->id}}">
                                            @if (file_exists('uploads/aboutus/bod/'.$bod->attachment) && $bod->attachment !='')
                                                <img src="{{ asset('uploads/aboutus/bod/'.$bod->attachment) }}">
                                            @endif                                        
                                            <span>
                                                <b>{{ $bod->name }}</b>
                                                <i>{{ $bod->post }}</i>
                                            </span>
                                        </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            @foreach ($bods as $bod)
                                <div id="tabs-{{$bod->id}}">
                                    @if (file_exists('uploads/aboutus/bod/'.$bod->attachment) && $bod->attachment !='')
                                        <img src="{{ asset('uploads/aboutus/bod/'.$bod->attachment) }}">
                                    @endif                                          
                                    <h2>{{ $bod->name }}</h2>
                                    <h3>{{ $bod->post }} </h3>
                                    <p>{!! $bod->description !!}</p>
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