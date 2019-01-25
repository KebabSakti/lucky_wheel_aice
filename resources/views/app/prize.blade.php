@extends('layouts.app')

@section('content')

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="au-card m-b-30">
                    <div class="au-card-inner">
                        <h3 class="title-2 m-b-40">Prize Setting</h3>
                        
                        <pre>
                        @foreach($data as $d)
                            {{var_dump($d[0])}}
                        @endforeach
                        </pre>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection