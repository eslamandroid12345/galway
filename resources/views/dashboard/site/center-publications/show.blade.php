@extends('dashboard.core.app')
@section('title', __('titles.center-programmes'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--                    <h1>@lang('dashboard.Structure')</h1>--}}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Content Wrapper. Contains page content -->
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@lang('dashboard.center-programmes')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">@lang('dashboard.Structure')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.center-programmes')</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('dashboard.center-programmes')</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <p class="lead">{{$programme->name}}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.title_ar'):</th>
                                                <td>{{$programme->title_ar}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.title_en'):</th>
                                                <td>{{$programme->title_en}}</td>
                                            </tr>

                                            <tr>
                                                <th style="width:50%">@lang('dashboard.desc_ar'):</th>
                                                <td>{{$programme->desc_ar}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.desc_en'):</th>
                                                <td>{{$programme->desc_en}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Image'):</th>
                                                <td><img src="{{ asset($programme->image?->path)}}" width="200px"
                                                         height="auto">
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js_addons')

@endsection

