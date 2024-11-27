@extends('dashboard.core.app')
@section('title', __('titles.Home'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>@lang('dashboard.Home')</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.center-programmes')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['center-programmes']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.center-publications')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['center-publications']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.center-news')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['center-news']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.programs')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['programs']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.lectures')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['lectures']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.contacts')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['contacts']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.managers')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['managers']}}</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-dark">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center">@lang('dashboard.visitors')</span>
                                        <span class="info-box-number text-center mb-0">{{$data['visitors']}}</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
