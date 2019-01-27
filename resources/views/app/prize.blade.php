@extends('layouts.app')

@section('page-tittle')
    Prize
@endsection

@section('nav-prize')
    active
@endsection

@section('modal_title')
Add New Setting
@endsection

@section('modal_body')
<form action="{{ route('app.addPrize') }}" method="post" class="form-horizontal form-add-prize">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Persentase Menang</label>
        </div>
        <div class="col-12 col-md-9">
            <p class="form-control-static"><span class="win-percentage text-primary">0</span> %</p>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class="form-control-label">Nama Outlet</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="kode_asset" id="select" class="form-control" required="true">
                <option value="">Please select</option>
                @foreach($outlet as $outlet)
                    <option value="{{$outlet['kode_asset']}}">{{$outlet['nama_toko']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="kode_produk[]" class=" form-control-label">Prizes List</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="kode_produk[]" id="select" class="form-control select2-prizes" multiple="multiple" required="true">
                @foreach($product as $product)
                    <option value="{{$product['kode']}}">{{$product['nama']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
        </div>
        <div class="col-12 col-md-9">
            <button type="submit" class="btn btn-primary btn-sm">
                Simpan
            </button>
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
                    <h3 class="title-5 m-b-35">Prize Setting</h3>
                    <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#modal_main">
                        <i class="zmdi zmdi-plus"></i>add item</button>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>Outlet</th>
                                <th>Username</th>
                                <th>Lat</th>
                                <th>Lng</th>
                                <th>Prize</th>
                                <th>Persentase</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

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
                                                <span class="block-email" style="margin-bottom: 3px;">{{ $p['product']['nama'] }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center"><span class="text-primary">{{floor(count($k['prizes'])/12*100)}}</span> %</td>
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