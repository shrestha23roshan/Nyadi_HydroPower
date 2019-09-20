<!DOCTYPE html>
<html>
<head>
    @section('title', $page->title)

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
                          <h2>{{ $page->heading }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javacript:void(0)">CSR</a></li>
                                <li class="active"><a href="javacript:void(0)">{{ $page->heading }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="content-details">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <a href="{{ asset('uploads/pages/'.$page->file) }}" target="_blank">{{ $page->file }}</a>
                            </div>
                        </div>
                    </div>
                 </div>
             
                
            </div>
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>