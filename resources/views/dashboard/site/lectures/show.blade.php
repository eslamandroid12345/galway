@extends('dashboard.core.app')
@section('title', __('titles.lectures'))
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
                            <h1>@lang('dashboard.lectures')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">@lang('dashboard.Structure')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.lectures')</li>
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
                                <h3 class="card-title">@lang('dashboard.lectures')</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <p class="lead">{{$lecture->name}}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Name') @lang('dashboard.ar'):</th>
                                                <td>{{$lecture->first_title_ar}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.Name') @lang('dashboard.en'):</th>
                                                <td>{{$lecture->first_title_en}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.title_ar'):</th>
                                                <td>{{$lecture->second_title_ar}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.title_en'):</th>
                                                <td>{{$lecture->second_title_en}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.job_title') @lang('dashboard.ar'):</th>
                                                <td>{{$lecture->job_title_ar}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.job_title') @lang('dashboard.en'):</th>
                                                <td>{{$lecture->job_title_en}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.desc_ar') :</th>
                                                <td>{!! $lecture->desc_ar !!}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.desc_en') :</th>
                                                <td>{!! $lecture->desc_ar !!}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.writer_name'):</th>
                                                <td>{{$lecture->writer_name}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.video_url'):</th>
                                                <td><a href="{{$lecture->url}}" target="_blank">@lang('dashboard.url')</a></td>
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

