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