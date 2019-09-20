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
                                <li class="active"><a href="javacript:void(0)">Photos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    <div class="row">
                        <div class="col-sm-3">
                             <div class="gallery-box gallery-bg">
                                <a href="{{ route('image-gallery.album') }}">
                                     <div class="g-images">
                                         <img src="img/project.jpg" alt="Gallery">
                                     </div>
                                     <h4>Projects</h4>
                                 </a>
                             </div>
                         </div>
                         <div class="col-sm-3">
                             <div class="gallery-box gallery-bg">
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
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>