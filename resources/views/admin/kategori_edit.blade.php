@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Kategori Ayarları</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="m-b-40 text-center"><img src="{{ $kategori->thumb_resim }}" alt="" class="img-thumbnail" width="250"/></div>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! Form::model($kategori, ['route' => ['kategori.update', $kategori->id],"method" => "put"]) !!}

                {!! Form::bsText("baslik", "Başlık") !!}
                {!! Form::bsFile("resim", "Resim") !!}
                {!! Form::bsSubmit("Kaydet") !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

