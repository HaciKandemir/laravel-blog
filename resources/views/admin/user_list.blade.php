@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Kullanıcı Listesi</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>Rütbe</td>
                        <td>İsim</td>
                        <td>Eposta</td>
                        <td>Üyelik Tarihi</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->yetki($user->id)}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="/user/{{$user->id}}/edit" class="eylem btn btn-primary " data-toggle="tooltip" title="Düzenle"><i class="fa fa-edit"></i></a>
                            <a href="/user/{{$user->id}}" class="eylem btn btn-danger " data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Are you sure?"><i class="fa fa-remove"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

