@extends('layouts.backend-adminlte.app')
@section('title','User Create')
@section('breadcrumb','User Create')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <a href="{{route('users.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>
                    <h3 class="card-title">Create</h3>
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
                <form method="POST" action="{{route('users.store')}}">
                    @csrf
                    <div class="card-body">
                        @include('adminlte.users.fields')
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
@endsection

