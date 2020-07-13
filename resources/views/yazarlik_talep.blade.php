@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Yazarlık Talebi</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! Form::open(["url"=>"/yazarlik_talep/gönder","method"=>"post"]) !!}
                {!! Form::bsTextarea("aciklama", "Açıklama",null,["class"=>"summernote"]) !!}
                {!! Form::bsSubmit("Talebi Yolla") !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

