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
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Outlet</th>
                                <th>T.Main</th>
                                <th>T.Kustomer</th>
                                <th>T.Spin</th>
                                <th>T.Menang</th>
                                <th>T.Kalah</th>
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="table-data-feature">

                                            	{{--
                                                <a href="#" class="item ajax-btn" data-toggle="tooltip" data-placement="top" title="Edit" data-ajx-action="{{route('banner.edit', ['id' => $k['id']])}}" data-ajx-title="Edit Banner">
                                                    <i class="zmdi zmdi-edit text-warning"></i>
                                                </a>
                                                <form action="{{route('banner.destroy', ['id' => $k['id']])}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="hidden" name="kode" value="{{$k['id']}}">
                                                    <button class="item del-btn" data-toggle="tooltip" data-placement="top" title="Delete" type="submit">
                                                        <i class="zmdi zmdi-delete text-danger"></i>
                                                    </button>
                                                </form>
                                                --}}

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