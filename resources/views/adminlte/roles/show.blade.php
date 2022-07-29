@extends('layouts.backend-adminlte.app')
@section('title','Detail Role')
@section('breadcrumb','Detail')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <a href="{{route('roles.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
{{--                    <form class="form-horizontal">--}}
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama Role</label>
                            <div class="col-sm-10">
                                <label for="inputName" class="col-form-label">{{$role->name}}</label>
                            </div>
                        </div>
{{--                        <div class="form-group row">--}}
{{--                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>--}}
{{--                            <div class="col-sm-10">--}}
{{--                                <label for="inputName" class="col-form-label">{{$user->email}}</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Permissions</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

