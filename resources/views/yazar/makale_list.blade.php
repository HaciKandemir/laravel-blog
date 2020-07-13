@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Makale Listesi</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="m-b-40 text-center">
                    <a href="{{ Auth::user()->yetki_kontrol("admin") ? url('/makale/create') : url('/makalem/create') }}" class="btn btn-danger">
                        <i class="fa fa-plus"></i>
                        YENİ MAKALE EKLE
                    </a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>Durum</td>
                        <td>Resim</td>
                        <td>Başlık</td>
                        <td>Slug</td>
                        <td>Yazar</td>
                        <td>Yayınlanma Tarihi</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($makaleler as $makale)
                        <tr>
                            <td><span style="font-weight: bold; font-size:15px; color:{{ ($makale->durum == 0)? 'darkred':'green' }};">{{ ($makale->durum == 0) ? 'Yayında Değil' : 'Yayında' }}</span></td>
                            <td><img src="{{ $makale->thumb_resim }}" alt="" class="img-thumbnail" width="150"/></td>
                            <td>{{$makale->baslik}}</td>
                            <td>{{$makale->slug}}</td>
                            <td>{{$makale->user->name}}</td>
                            <td>{{$makale->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="/makalem/{{$makale->id}}/edit" class="eylem btn btn-primary " data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="{!! route('makalem.destroy', $makale->id) !!}" class="eylem btn btn-danger " data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Are you sure?"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$makaleler->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

