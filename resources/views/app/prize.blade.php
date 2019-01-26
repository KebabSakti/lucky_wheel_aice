@extends('layouts.app')

@section('modal_title')
Add New Setting
@endsection

@section('modal_body')
<form action="{{ route('app.addPrize') }}" method="post" class="form-horizontal form-add-prize">
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Nama Outlet</label>
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
            <select name="kode_produk[]" id="select" class="form-control" multiple="true" required="true">
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

    <!--
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="email-input" class=" form-control-label">Email Input</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control">
            <small class="help-block form-text">Please enter your email</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="password-input" class=" form-control-label">Password</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="password" id="password-input" name="password-input" placeholder="Password" class="form-control">
            <small class="help-block form-text">Please enter a complex password</small>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="disabled-input" class=" form-control-label">Disabled Input</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="textarea-input" class=" form-control-label">Textarea</label>
        </div>
        <div class="col-12 col-md-9">
            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class=" form-control-label">Select</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="select" id="select" class="form-control">
                <option value="0">Please select</option>
                <option value="1">Option #1</option>
                <option value="2">Option #2</option>
                <option value="3">Option #3</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="selectLg" class=" form-control-label">Select Large</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                <option value="0">Please select</option>
                <option value="1">Option #1</option>
                <option value="2">Option #2</option>
                <option value="3">Option #3</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="selectSm" class=" form-control-label">Select Small</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                <option value="0">Please select</option>
                <option value="1">Option #1</option>
                <option value="2">Option #2</option>
                <option value="3">Option #3</option>
                <option value="4">Option #4</option>
                <option value="5">Option #5</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="disabledSelect" class=" form-control-label">Disabled Select</label>
        </div>
        <div class="col-12 col-md-9">
            <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                <option value="0">Please select</option>
                <option value="1">Option #1</option>
                <option value="2">Option #2</option>
                <option value="3">Option #3</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="multiple-select" class=" form-control-label">Multiple select</label>
        </div>
        <div class="col col-md-9">
            <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                <option value="1">Option #1</option>
                <option value="2">Option #2</option>
                <option value="3">Option #3</option>
                <option value="4">Option #4</option>
                <option value="5">Option #5</option>
                <option value="6">Option #6</option>
                <option value="7">Option #7</option>
                <option value="8">Option #8</option>
                <option value="9">Option #9</option>
                <option value="10">Option #10</option>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Radios</label>
        </div>
        <div class="col col-md-9">
            <div class="form-check">
                <div class="radio">
                    <label for="radio1" class="form-check-label ">
                        <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Option 1
                    </label>
                </div>
                <div class="radio">
                    <label for="radio2" class="form-check-label ">
                        <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">Option 2
                    </label>
                </div>
                <div class="radio">
                    <label for="radio3" class="form-check-label ">
                        <input type="radio" id="radio3" name="radios" value="option3" class="form-check-input">Option 3
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Inline Radios</label>
        </div>
        <div class="col col-md-9">
            <div class="form-check-inline form-check">
                <label for="inline-radio1" class="form-check-label ">
                    <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">One
                </label>
                <label for="inline-radio2" class="form-check-label ">
                    <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input">Two
                </label>
                <label for="inline-radio3" class="form-check-label ">
                    <input type="radio" id="inline-radio3" name="inline-radios" value="option3" class="form-check-input">Three
                </label>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Checkboxes</label>
        </div>
        <div class="col col-md-9">
            <div class="form-check">
                <div class="checkbox">
                    <label for="checkbox1" class="form-check-label ">
                        <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                    </label>
                </div>
                <div class="checkbox">
                    <label for="checkbox2" class="form-check-label ">
                        <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                    </label>
                </div>
                <div class="checkbox">
                    <label for="checkbox3" class="form-check-label ">
                        <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Inline Checkboxes</label>
        </div>
        <div class="col col-md-9">
            <div class="form-check-inline form-check">
                <label for="inline-checkbox1" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input">One
                </label>
                <label for="inline-checkbox2" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2" value="option2" class="form-check-input">Two
                </label>
                <label for="inline-checkbox3" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3" value="option3" class="form-check-input">Three
                </label>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="file-input" class=" form-control-label">File input</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" id="file-input" name="file-input" class="form-control-file">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="file-multiple-input" class=" form-control-label">Multiple File input</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file">
        </div>
    </div>
    -->

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
                                <th>Nama Outlet</th>
                                <th>Username</th>
                                <th>Lat</th>
                                <th>Lng</th>
                                <th>Prize</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $k)
                                <tr class="tr-shadow">
                                    <td>{{$k['nama_toko']}}</td>
                                    <td>{{$k['username']}}</td>
                                    <td>{{$k['lat']}}</td>
                                    <td>{{$k['lng']}}</td>
                                    <td>
                                        @foreach($k['prizes'] as $p)
                                            <span class="block-email">{{ $p['product']['nama'] }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection