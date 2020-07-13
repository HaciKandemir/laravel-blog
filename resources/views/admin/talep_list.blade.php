@extends('layouts.master')

@section('icerik')
    <!-- Page Header -->
    <header class="masthead" style="background: #0085A1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Yazarlık Talebleri</h1>
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
                        <td>Durum</td>
                        <td>Adı</td>
                        <td>E-mail</td>
                        <td>Talep Tarihi</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($talepler as $talep)
                        <tr>
                            <td>
                                <input type="checkbox" class="durum" data-id="{{$talep->id}}" data-url="talep/durum-degis" {{$talep->user->yetki_kontrol("author") ? "checked" : null}}>
                            </td>
                            <td>{{$talep->user->name}}</td>
                            <td>{{$talep->user->email}}</td>
                            <td>{{$talep->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="/talep/{{$talep->id}}/edit" class="eylem btn btn-primary " data-toggle="modal" data-target="#aciklama{{$talep->id}}" title="İncele"><i class="fa fa-eye"></i></a>
                                <a href="/talep/{{$talep->id}}" class="eylem btn btn-danger " data-toggle="tooltip" title="Sil" data-method="delete" data-confirm="Are you sure?"><i class="fa fa-remove"></i></a>
                            </td>
                            <!--------------------------->
                            <!-- Modal -->
                            <div class="modal fade" id="aciklama{{$talep->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 15px">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{{$talep->user->name." Yazarlık Talebi"}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! $talep->aciklama !!}
                                            {!! Form::model($talep, ['route' => ['talep.update', $talep->user->id],"method" => "put"]) !!}
                                            {!! Form::bsCheckbox("rol","Roller",[["value" => 2, "text"=> "Yazar", "is_checked" => $talep->user->yetki_kontrol("author")],]) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                            <button type="button" class="btn btn-primary">Değişiklikleri kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--------------------------->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$talepler->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

