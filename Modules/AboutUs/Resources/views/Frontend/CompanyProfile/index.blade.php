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
                        <h2>Company Profile</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javascript:void(0)">About</a></li>
                                <li class="active"><a href="javascript:void(0)">Company Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    <p>{!! $companyProfile->description !!}</p>
                </div>
            </div>
        </div>




        @include('layouts.frontend.partial.footer')
</body>
</html>