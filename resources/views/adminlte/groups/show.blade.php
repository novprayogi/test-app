@extends('layouts.backend-adminlte.app')
@section('title','Detail Group')
@section('breadcrumb','Detail')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <a href="{{route('groups.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
{{--                    <form class="form-horizontal">--}}
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <label for="inputName" class="col-form-label">{{$group->nama}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Kota</label>
                            <div class="col-sm-10">
                                <label for="inputName" class="col-form-label">{{$group->kota}}</label>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

