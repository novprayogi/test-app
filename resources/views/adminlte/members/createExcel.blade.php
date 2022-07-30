@extends('layouts.backend-adminlte.app')
@section('title','Member Import')
@section('breadcrumb','Member Import')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
{{--                    <a href="{{route('members.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i></a>--}}
                    <h3 class="card-title">Import Excel</h3>
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
                <form method="POST" action="{{route('members.storeExcel')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('adminlte.members.fieldsExcel')
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
@endsection

