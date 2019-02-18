@extends('layouts.app')

@section('page-tittle')
    Prize
@endsection

@section('nav-prize')
    active
@endsection

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="overview-wrap">
                    <h3 class="title-5 m-b-35">Prize Setting</h3>
                    <a href="#" class="au-btn au-btn-icon au-btn--blue ajax-btn" data-ajx-action="{{route('app.create')}}" data-ajx-title="Tambah Setting">
                        <i class="zmdi zmdi-plus"></i>add item</a>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2 table-striped table-bordered dt">
                        <thead>
                            <tr>
                                <th>Outlet</th>
                                <th>Username</th>
                                <th>Lat</th>
                                <th>Lng</th>
                                <th>Prize</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $kode = array();
                            @endphp
                            @if(!count($data))
                                <tr class="tr-shadow">
                                    <td colspan="8" class="text-center">Belum ada setting tersimpan</td>
                                </tr>
                            @else
                                @foreach($data as $k)
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle;">{{$k['nama_toko']}}</td>
                                        <td>{{$k['username']}}</td>
                                        <td>{{$k['lat']}}</td>
                                        <td>{{$k['lng']}}</td>
                                        <td>
                                            @foreach($k['prizes'] as $p)

                                                @php
                                                    $kode[] = $p['product']['nama'].' ('.$p['prize_stock'].')';
                                                @endphp

                                            @endforeach

                                            @php
                                                $kode = array_unique($kode);
                                            @endphp

                                            @foreach($kode as $z)
                                                <span class="block-email" style="margin-bottom: 3px;">{{$z}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <!--
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-info text-primary"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit text-warning"></i>
                                                </button>
                                                -->
                                                <form action="{{route('app.delPrize')}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="kode_asset" value="{{$k['kode_asset']}}">
                                                    <button class="item del-btn" data-toggle="tooltip" data-placement="top" title="Delete" type="submit">
                                                        <i class="zmdi zmdi-delete text-danger"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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