<div id="{{$kode_produk}}" class="row form-group">
    <div class="col col-md-3">
        <label class="form-control-label"></label>
    </div>
    <div class="col-12 col-md-9">
        <div class="row">
            <div class="col-8 col-md-8">
                <input type="hidden" name="kode_produk[]" class="form-control" value="{{$kode_produk}}" readonly="true">
                <input type="text" class="form-control" value="{{$nama_produk}}" readonly="true">
            </div>
            <div class="col-4 col-md-4">
                <input type="number" name="stock_prize[]" class="form-control prize-percent" value="0" min="0">
            </div>
        </div>
    </div>
</div>