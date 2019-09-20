<div class="main-wrapper">
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="img/logo.png" alt="Logo" align="left">
                            <div class="logo-text">
                                <h2>Nyadi Hydropower Limited</h2>
                                <h3> न्यादी हाइड्रोपावर लिमिटेड</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-8">
                    <div class="navigation">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    About
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('company-profile.index') }}">Company Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('bod.index') }}">Board of Director</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('team.index')}}">NHL Team</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Projects
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('nhp.index') }}">Nyadi Hydropower Project</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('salient-features.index') }}">Salient Features</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('progress-report.index') }}">Progress Report</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Investor Relations
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Annual General Meeting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('annual-report.index') }}">Annual Reports</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('financial-report.index') }}">Financial Reports</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                        @foreach ($pages as $page)

                                    <a href="@if(count($page->activeChildrens)>0) javascript:void(0); @else {!! route('pages.show',$page->slug) !!} @endif" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropMenu">{!! $page->heading !!}</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if($page->activeChildrens)
                                        @foreach($page->activeChildrens as $child)
                                          <a href="{!! route('pages.show',$child->slug) !!}" class="dropdown-item">{!! $child->heading !!}</a>
                                        @endforeach
                                    @endif
                                    </div>
                                    @endforeach

                                </li>
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Gallery
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('image-gallery.index') }}">Photo</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('video.index') }}">Video</a>
                                    <div class="dropdown-divider"></div>
                                    </div>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contacts') }}">Contact Us</a>
                                </li>
                                <li class="nav-item search-icons">
                                    <a class="nav-link" href="javascript:void(0)">
                                        <span class="fa fa-search"></span>
                                    </a>
                                </li>
                                </ul>
                            </div>
                            <div class="search-filed">
                                <script async src="https://cse.google.com/cse.js?cx=002195127206278897611:wmletfprdzk"></script>
                                <div class="gcse-search"></div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>