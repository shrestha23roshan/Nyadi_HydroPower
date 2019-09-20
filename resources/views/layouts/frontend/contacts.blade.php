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
                        <h2>Contact</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li class="active"><a href="javacript:void(0)">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                   <div class="row">
                       <div class="col-sm-6">
                            <div class="contact-details">
                                <h3>{{ $setting->site_name }}</h3>
                                <p>{{ $setting->site_address }}</p>
                                <p><b>P.O.BOX:</b>  {{ $setting->site_pobox }}</p>
                                <p><b>Phone:</b>  {{ $setting->site_phone }}</p>
                                <p><b>Fax:</b>  {{ $setting->site_fax }}</p>
                                <p><b>Email:</b> <a href="mailto:nhl@nhl.com.np">  {{ $setting->site_email }}</a></p>
                            </div>
                            <div class="Feedback">
                                <h3>Send Feedback</h3>
                            @include('layouts.frontend.alert')
                                <form method="post" action="{{ route('contacts.mail') }}">
                                        {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" id="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" id="phone" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" id="address" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea type="text" name="message" id="message" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button class="btn form-control">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="location-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.94726490654!2d85.32617331443396!3d27.68802473294914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bbe2d2973b%3A0x14f3e6630e80f740!2sButwal+Power+Co.+Ltd.!5e0!3m2!1sen!2snp!4v1564900657737!5m2!1sen!2snp" width="600" height="225" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.180949610312!2d84.41882801691995!3d28.32714640565584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDE5JzM3LjciTiA4NMKwMjUnMTUuNyJF!5e0!3m2!1sen!2snp!4v1567593836192!5m2!1sen!2snp" width="600" height="225" frameborder="0" style="border:0;" allowfullscreen=""></iframe>               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>