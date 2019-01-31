<form action="{{route('produk.store')}}" method="post" class="form-horizontal">
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Nama Produk</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" name="nama" class="form-control" required="true">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Harga Produk</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="number" name="harga" class="form-control" value="0" required="true">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Set Hadiah</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="is_prize" value="1">
                <label class="form-check-label"> * Centang untuk set sebagai hadiah</label>
            </div>
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