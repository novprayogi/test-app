@extends('layouts.backend-adminlte.app')
@section('title','Member Edit')
@section('breadcrumb','Member Edit')
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <a href="{{route('members.index')}}" class="card-title btn btn-primary"><i class="fa fa-arrow-left"></i> </a>
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
                <form action="{{ route('members.update',$member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @include('adminlte.members.fields')
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
@endsection

