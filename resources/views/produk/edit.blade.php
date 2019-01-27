<form action="{{route('produk.update', ['id' => $produk['kode']])}}" method="post" class="form-horizontal">
    @method('PATCH')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Nama Produk</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="text" name="nama" class="form-control" value="{{$produk['nama']}}" placeholder="Nama Produk" required="true">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Harga Produk</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="number" name="harga" class="form-control" value="{{$produk['harga']}}" placeholder="Harga Produk" required="true">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
        </div>
        <div class="col-12 col-md-9">
            <button type="submit" class="btn btn-primary btn-sm">
                Update
            </button>
        </div>
    </div>
</form>