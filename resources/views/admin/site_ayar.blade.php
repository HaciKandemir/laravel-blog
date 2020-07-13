@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Site Ayarları</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! Form::open(['url' => '/site-ayar/guncelle', 'method' => 'put']) !!}
                @foreach($ayarlar as $ayar)
                {!! Form::bsText($ayar->name,trans("form.".$ayar->name),$ayar->value) !!}
                @endforeach
                {!! Form::bsSubmit("Kaydet") !!}
                {!! Form::close() !!}
             </div>
        </div>
    </div>
@endsection

