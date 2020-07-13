@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Kullanıcı Ayarları</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {!! Form::model($user, ['route' => ['user.update', $user->id],"method" => "put"]) !!}
                {!! Form::bsCheckbox("rol","Roller",[
                    ["value" => 1, "text"=> "Admin", "is_checked" => $user->yetki_kontrol("admin")],
                    ["value" => 2, "text"=> "Yazar", "is_checked" => $user->yetki_kontrol("author")],
                    ["value" => 3, "text"=> "Standart", "is_checked" => $user->yetki_kontrol("standart")],
                ]) !!}
                {!! Form::bsText("name", "İsim") !!}
                {!! Form::bsText("email", "E-Posta") !!}
                {!! Form::bsPassword("password", "Şifre") !!}
                {!! Form::bsSubmit("Kaydet") !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

