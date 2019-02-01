<div class="row form-group">
    <div class="col col-md-3">
    </div>
    <div class="col-9 col-md-6">
        <select name="kode_produk[]" class="form-control prize-kode" required="true">
        	<option value="" selected="true">Pilih Hadiah</option>
	        @foreach($produk as $produk)
	        	<option value="{{$produk['kode']}}">{{$produk['nama']}}</option>
	        @endforeach
    	</select>
    </div>
    <div class="col-2 col-md-2">
        <input type="number" name="persentase[]" class="form-control prize-percent" value="0">
    </div>
    <div class="col-1 col-md-1">
        <button type="button" class="btn btn-danger btn-sm prize-hapus"><i class="fa fa-trash"></i></button>
    </div>
</div>