@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Makale Düzenle</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! Form::model($makale,["route"=>["makalem.update",$makale->id], "method"=>"put","files"=> true]) !!}
                {!! Form::bsText("baslik", "Başlık") !!}
                {!! Form::bsSelect("kategori_id", "Kategori",null,$kategoriler,"Bir Kategori Seçiniz !") !!}
                {!! Form::bsFile("resim", "Resim") !!}
                {!! Form::bsTextarea("icerik", "İçerik",null,["class"=>"summernote"]) !!}
                {!! Form::bsSubmit("KAYDET") !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

