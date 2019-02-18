<form action="{{route('banner.update', ['id' => $banner['id']])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label"></label>
        </div>
        <div class="col-12 col-md-9">
            <img src="{{asset('ads/'.$banner['file'])}}" class="img-thumbnail" width="150">
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">File</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="file" name="url" class="form-control">
            <label class="form-check-label"> * Kosongkan jika tidak mengganti foto</label>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Set Aktif</label>
        </div>
        <div class="col-12 col-md-9">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="is_aktif" value="1" {{($banner['is_active'] == 1) ? 'checked':''}}>
                <label class="form-check-label"> * Centang untuk aktifkan</label>
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