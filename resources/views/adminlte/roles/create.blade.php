@extends('layouts.backend-adminlte.app')
@section('title','Role Create')
@section('breadcrumb','Role Create')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <a href="{{route('roles.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('roles.store')}}">
                    @csrf
                    <div class="card-body">
                        @include('adminlte.roles.fields')
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
@endsection

