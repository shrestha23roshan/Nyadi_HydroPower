@php 
    $countBoardOfDirector = Modules\AboutUs\Entities\BOD::count();
    $countProgressReport = Modules\Projects\Entities\ProgressReport::count(); 
    $countAnnualReport = Modules\InvestorRelations\Entities\AnnualReport::count(); 
    $countFinancialReport = Modules\InvestorRelations\Entities\FinancialReport::count(); 
@endphp 

@extends('layouts.backend.container')

@section('dynamicdata')

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua" style="margin: 20px; padding: 30px">
                <div class="inner">
                    <h3>{{ $countBoardOfDirector }}</h3>

                    <p>Board Of Directors</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.about-us.bod.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green" style="margin: 20px; padding:  30px ">
                <div class="inner">
                    <h3>{{ $countProgressReport }}</h3>

                    <p>Progress Reports</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.projects.progressreport.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-yellow" style="margin: 20px; padding:  30px">
                <div class="inner">
                    <h3>{{ $countAnnualReport }}</h3>

                    <p>Annual Reports</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.investor-relations.annualreport.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red" style="margin: 20px; padding:  30px">
                <div class="inner">
                    <h3>{{ $countFinancialReport }}</h3>

                    <p>Financial Reports</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.investor-relations.financialreport.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    
@endsection


