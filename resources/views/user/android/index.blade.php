@extends('layouts.app')

@section('page-tittle')
    User Android
@endsection

@section('nav-user-andro')
    active
@endsection

@section('content')

    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-wrap">
                        <h3 class="title-5 m-b-35">List User Android</h3>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Outlet</th>
                                <th>Status</th>
                                <th>Tgl. Join</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!count($user))
                                <tr class="tr-shadow">
                                    <td colspan="5" class="text-center">Belum ada data user</td>
                                </tr>
                            @else
                                @foreach($user as $k)
                                    <tr class="tr-shadow">
                                        <td style="vertical-align: middle;">{{$k['username']}}</td>
                                        <td>{{$k['outlet']['nama_toko']}}</td>
                                        <td>{{$k['status']}}</td>
                                        <td>{{$k['created_at']}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <!--
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="zmdi zmdi-info text-primary"></i>
                                                </button>
                                                -->
                                                <a href="#" class="item ajax-btn" data-toggle="tooltip" data-placement="top" title="Edit" data-ajx-action="{{route('android.edit', ['id' => $k['username']])}}" data-ajx-title="Edit User">
                                                    <i class="zmdi zmdi-edit text-warning"></i>
                                                </a>
                                                <form action="{{route('android.destroy', ['id' => $k['username']])}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
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