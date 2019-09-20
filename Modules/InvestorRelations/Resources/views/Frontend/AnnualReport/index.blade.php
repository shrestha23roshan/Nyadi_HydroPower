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
                        <h2>Annual Reports</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home')}}">Home</a></li>
                                <li><a href="javacript:void(0)">Investor Relations</a></li>
                                <li class="active"><a href="javacript:void(0)">Annual Reports</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="bg-blue text-black">
                                            <th>S.N</th>
                                            <th>File Name</th>
                                            <th>Added At</th>
                                            <th>Downlaod</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($annualReports as $annualReport)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $annualReport->title }}</td>
                                                <td>{{ $annualReport->created_at }}</td>
                                                <td><a class="bg-blue text-black poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/investor-relations/annualreports/'.$annualReport->attachment) }}" target="_blank">View And Download</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.frontend.partial.footer')
    </body>
</html>