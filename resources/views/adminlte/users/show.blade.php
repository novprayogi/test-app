@extends('layouts.backend-adminlte.app')
@section('title','Detail User')
@section('breadcrumb','Detail')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <a href="{{route('users.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body">
{{--                    <form class="form-horizontal">--}}
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <label for="inputName" class="col-form-label">{{$user->name}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <label for="inputName" class="col-form-label">{{$user->email}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Roles</label>
                            <div class="col-sm-10">
                                @foreach($user->getRoleNames() as $v)
                                <label class="label label-success">{{ $v  }}<br></label>
{{--                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">--}}
                                 @endforeach
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection

