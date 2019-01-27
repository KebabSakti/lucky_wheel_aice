<form action="{{route('android.update', ['id' => $user['username']])}}" method="post" class="form-horizontal">
    @method('PATCH')
    @csrf
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Username</label>
        </div>
        <div class="col-12 col-md-9">
            <p class="form-control-static">{{$user['username']}}</p>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Password Baru</label>
        </div>
        <div class="col-12 col-md-9">
            <input type="password" name="password" class="form-control">
            <span>*Kosongkan jika tidak mengganti password</span>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-3">
            <label class="form-control-label">Status User</label>
        </div>
        <div class="col-12 col-md-9">

            @foreach($sts as $s)
                @php
                    $c = ($s == $user['status']) ? 'checked':'';
                @endphp
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="{{$s}}" {{$c}}>
                    <label class="form-check-label" for="inlineRadio1">{{$s}}</label>
                </div>
            @endforeach

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