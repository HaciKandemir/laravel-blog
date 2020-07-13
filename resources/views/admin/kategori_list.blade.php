@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Kategori Listesi</h1>
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
                    <a href="/kategori/create" class="btn btn-danger">
                        <i class="fa fa-plus"></i>
                        YENİ KATEGORİ EKLE
                    </a>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>Resim</td>
                        <td>Başlık</td>
                        <td>Slug</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($kategoriler as $kategori)
                        <tr>
                            <td><img src="{{ $kategori->thumb_resim }}" alt="" class="img-thumbnail" width="150"/></td>
                            <td>{{$kategori->baslik}}</td>
                            <td>{{$kategori->slug}}</td>
                            <td>
                                <a href="/kategori/{{$kategori->id}}/edit" class="eylem btn btn-primary " data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                                <a href="{!! route('kategori.destroy', $kategori->id) !!}" class="eylem btn btn-danger " data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Are you sure?"><i class="fa fa-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$kategoriler->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

