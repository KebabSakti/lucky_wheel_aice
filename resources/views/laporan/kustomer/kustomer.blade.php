@extends('layouts.app')

@section('page-tittle')
    Laporan Outlet
@endsection

@section('nav-lap-outlet')
    active
@endsection

@section('content')

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-wrap">
                        <h3 class="title-5 m-b-35">Laporan Outlet</h3>
                    </div>
                    <div class="form-group col-4">
					    <input type="text" class="form-control form-control-sm dr" placeholder="Periode">
					</div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 table-striped table-bordered dt" data-rg="7">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No. Hp</th>
                                <th>Outlet</th>
                                <th>T.Spin</th>
                                <th>T.Menang</th>
                                <th>T.Kalah</th>
                                <th>Hadiah</th>
                                <th>Tanggal</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                            @if(!count($outlet))
                                <tr class="tr-shadow">
                                    <td colspan="5" class="text-center">Belum ada data</td>
                                </tr>
                            @else
                                @foreach($outlet as $outlet)
                                    <tr class="tr-shadow">
                                        <td>{{$outlet['nama_toko']}}</td>
                                        <td>{{$outlet['main']}}</td>
                                        <td>{{$outlet['kustomer']}}</td>
                                        <td>{{$outlet['spin']}}</td>
                                        <td>{{$outlet['menang']}}</td>
                                        <td>{{$outlet['kalah']}}</td>
                                        <td>
                                            @foreach($outlet['hadiah'] as $h)
                                                <span class="block-email" style="margin-bottom: 3px;">{{$h['hadiah']}}</span>
                                            @endforeach
                                        </td>
                                        <td>{{$outlet['tanggal']}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="#" class="item ajax-btn" data-toggle="tooltip" data-placement="top" title="Detail" data-ajx-action="" data-ajx-title="Detail Laporan">
                                                    <i class="zmdi zmdi-info text-primary"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td class="text-success" style="padding-left: 35px;">{{$total['main']}}</td>
                                    <td class="text-success" style="padding-left: 35px;">{{$total['kustomer']}}</td>
                                    <td class="text-success" style="padding-left: 35px;">{{$total['spin']}}</td>
                                    <td class="text-success" style="padding-left: 35px;">{{$total['menang']}}</td>
                                    <td class="text-success" style="padding-left: 35px;">{{$total['kalah']}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection