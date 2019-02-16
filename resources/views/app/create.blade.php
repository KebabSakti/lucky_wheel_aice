<form action="{{ route('app.addPrize') }}" method="post" class="form-horizontal form-add-prize">
    @csrf
    <!--
    <div class="row form-group">
        <div class="col col-md-3">
            <label class=" form-control-label">Persentase Menang</label>
        </div>
        <div class="col-12 col-md-9">
            <p class="form-control-static"><span class="win-percentage text-primary">0</span> %</p>
        </div>
    </div>
    -->
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
            <label class="form-control-label">Daftar Hadiah</label>
        </div>
        <div class="col-12 col-md-9">
            <!--
            <button type="button" class="btn btn-success btn-sm add-hadiah" data-ajx-action="{{route('utilities.get_produk')}}">Tambah</button>
            -->
            <select class="form-control select2-prizes" required="true" multiple="multiple">
                @foreach($product as $produk)
                    <option value="{{$produk['kode']}}">{{$produk['nama']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="daftar-hadiah-kontainer" data-ajx-action="{{route('utilities.get_produk')}}">
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