<form action="{{route('app.update')}}" method="post" class="form-horizontal form-add-prize">
    @method('PATCH')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="select" class="form-control-label">Nama Outlet</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="hidden" name="kode_asset" class="form-control" value="{{ $outlet[0]['kode_asset'] }}">
            <input type="text" class="form-control" value="{{ $outlet[0]['nama_toko'] }}" readonly="readonly">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Daftar Hadiah</label>
        </div>
        <div class="col-12 col-md-9">
            <select class="form-control select2-prizes" required="true" multiple="multiple">
                @foreach($prize as $p)
                    <option value="{{$p['kode_produk']}}" selected="selected">{{$p['product']['nama']}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="daftar-hadiah-kontainer" data-ajx-action="{{route('utilities.get_produk')}}">
        @foreach($prize as $p)
        <div id="{{$p['kode_produk']}}" class="row form-group">
            <div class="col col-md-3">
                <label class="form-control-label"></label>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-8 col-md-8">
                        <input type="hidden" name="kode_produk[]" class="form-control" value="{{$p['kode_produk']}}">
                        <input type="text" class="form-control" value="{{$p['product']['nama']}}" readonly="true">
                    </div>
                    <div class="col-4 col-md-4">
                        <input type="number" name="prize_stock[]" class="form-control prize-percent" min="0" value="{{$p['prize_stock']}}" required="true">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
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