@extends('layouts.backend-adminlte.app')
@section('title','Dashboard Test')
@section('breadcrumb','Dashboard Test')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$groups}}</h3>

                    <p>Groups</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                @can('groups.index')
                    <a href="{{{route('groups.index')}}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$members}}</h3>

                    <p>Member</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                @can('members.index')
                    <a href="{{route('members.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                @can('users.index')
                    <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$roles}}</h3>

                    <p>Roles</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                @can('roles.index')
                    <a href="{{route('roles.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endcan
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

@endsection

