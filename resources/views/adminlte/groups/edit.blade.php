@extends('layouts.backend-adminlte.app')
@section('title','Group Edit')
@section('breadcrumb','Group Edit')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <a href="{{route('groups.index')}}" class="card-title btn btn-primary"><i class="fa fa-arrow-left"></i> </a>
{{--                    <h4 class="card-title text-center">Edit</h4>--}}
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
                <form action="{{ route('groups.update',$group->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('adminlte.groups.fields')
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
@endsection

