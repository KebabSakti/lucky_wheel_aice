@extends('layouts.app')

@section('page-tittle')
    Outlet
@endsection

@section('nav-outlet')
    active
@endsection

@section('modal_title')
Data Outlet
@endsection

@section('modal_body')
<form action="#" method="post" class="form-horizontal">
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Username</label>
        </div>
        <div class="col-12 col-md-9">
            <p class="form-control-static"><span class="win-percentage text-primary">0</span> %</p>
        </div>
    </div>
</form>
@endsection

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="overview-wrap">
                    <h3 class="title-5 m-b-35">List Outlet</h3>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Outlet</th>
                                <th>Lat</th>
                                <th>Lng</th>
                                <th>Tgl. Add</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!count($outlets))
                                <tr class="tr-shadow">
                                    <td colspan="7" class="text-center">Belum ada data outlet</td>
                                </tr>
                            @else
                                @foreach($outlets as $k)
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle;">{{$k['nama_toko']}}</td>
                                        <td>{{$k['nama_toko']}}</td>
                                        <td>{{$k['lat']}}</td>
                                        <td>{{$k['lng']}}</td>
                                        <td>{{$k['created_at']}}</td>
                                        <!--
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-info text-primary"></i>
                                                </button>
                                                <a href="{{route('outlets.show', ['kode_asset' => $k['kode_asset']])}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit text-warning"></i>
                                                </a>
                                            </div>
                                        </td>
                                        -->
                                    </tr>
                                    <tr class="spacer"></tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection