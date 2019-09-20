
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
                        <h2>Salient Features</h2>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="javacript:void(0)">Projects</a></li>
                                <li class="active"><a href="javacript:void(0)">Salient Features</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content-details">
                   <table class="table table-bordered">
                       <tr>
                           <th colspan="2" style="background-color:#ddd" >Technical features of the project</th>
                       </tr>
                       <tr>
                           <td>
                               Type of the project
                           </td>
                           <td>
                               Run-of-the River
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Project location
                           </td>
                           <td>
                               Bahundanda VDC, Lamjung District
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Dam site
                           </td>
                           <td>
                               Naiche, Bahundanda VDC, Ward 2
                           </td>
                       </tr>
                        <tr>
                           <td>
                               Powerhouse site
                           </td>
                           <td>
                               Bahundanda VDC, Ward No.7
                           </td>
                       </tr>
                        <tr>
                           <td>
                               Installed Capacity
                           </td>
                           <td>
                               	30 MW
                           </td>
                       </tr>
                        <tr>
                           <td>
                               Average annual energy
                           </td>
                           <td>
                               168.5 GWh
                           </td>
                       </tr>
                        <tr>
                           <td>
                               Gross head
                           </td>
                           <td>
                               333.9 m
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Design flow
                           </td>
                           <td>
                               11.02 m3/s
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Catchment area at intake site	
                           </td>
                           <td>
                               154.7 km2
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Design Flood Discharge  
                           </td>
                           <td>
                               	509 m3/s (100 Yrs Flood)
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Settling basin 
                           </td>
                           <td>
                               128 m (L), 8 m (W), 10 m (H)
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Length of Headrace tunnel
                           </td>
                           <td>
                               	3.937 km
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Turbine type
                           </td>
                           <td>
                               Horizontal Axis Pelton
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Turbine Installation
                           </td>
                           <td>
                               	3 nos. with 10 MW capacity
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Transmission Line
                           </td>
                           <td>
                               7 km long of 132 kV capacity
                           </td>
                       </tr>
                       <tr>
                           <td>
                               Construction period
                           </td>
                           <td>
                               4 years
                           </td>
                       </tr>
                   </table>
                </div>
            </div>
        </div>
	@include('layouts.frontend.partial.footer')
</body>
</html>