@extends('layouts.app')

@section('page-tittle')
    Produk
@endsection

@section('nav-produk')
    active
@endsection

@section('content')

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-wrap">
                        <h3 class="title-5 m-b-35">List Produk</h3>
                        <a href="#" class="au-btn au-btn-icon au-btn--blue ajax-btn" data-ajx-action="{{route('produk.create')}}" data-ajx-title="Tambah Produk">
                            <i class="zmdi zmdi-plus"></i>add item</a>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Tgl. Add</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!count($produk))
                                <tr class="tr-shadow">
                                    <td colspan="5" class="text-center">Belum ada data produk</td>
                                </tr>
                            @else
                                @foreach($produk as $k)
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle;">{{$k['nama']}}</td>
                                        <td>{{$k['harga']}}</td>
                                        <td>{{$k['created_at']}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <!--
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-info text-primary"></i>
                                                </button>
                                                -->
                                                <a href="#" class="item ajax-btn" data-toggle="tooltip" data-placement="top" title="Edit" data-ajx-action="{{route('produk.edit', ['id' => $k['kode']])}}" data-ajx-title="Edit Produk">
                                                    <i class="zmdi zmdi-edit text-warning"></i>
                                                </a>
                                                <form action="{{route('produk.destroy', ['id' => $k['kode']])}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="kode" value="{{$k['kode']}}">
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