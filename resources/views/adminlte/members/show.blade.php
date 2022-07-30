@extends('layouts.backend-adminlte.app')
@section('title','Detail Member')
@section('breadcrumb','Detail')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <a href="{{route('members.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <label for="inputName" class="col-form-label">{{$member->nama}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <label for="inputName" class="col-form-label">{{$member->alamat}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nomor Hp</label>
                        <div class="col-sm-10">
                            <label for="inputName" class="col-form-label">{{$member->hp}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <label for="inputName" class="col-form-label">{{$member->email}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <label for="inputName" class="col-form-label">{{$member->group->kota}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Profile</label>
                        <div class="col-sm-10">
                            @if(!empty($member->profile))
                                <img width="150px" src="{{ url('/data_profile/'.$member->profile) }}">
                            @else
                                Belum Upload Profile
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

