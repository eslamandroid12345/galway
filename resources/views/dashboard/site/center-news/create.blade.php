@extends('dashboard.core.app')
@section('title', __('titles.center-news'))
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
                            <h1>@lang('dashboard.center-news')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">@lang('dashboard.Structure')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.center-news')</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <h6>@lang('dashboard.center-news')</h6>
                                    <form action="{{ route('center-news.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input name="type" type="hidden" value="center_news">
                                        <div>
                                            <label for="writer_name">@lang('dashboard.writer_name'):</label>
                                            <input type="text" name="writer_name" id="writer_name" class="form-control"
                                                   value="{{ old('writer_name') }}"
                                                   placeholder="@lang('dashboard.writer_name')">
                                            @error('title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="title_ar">@lang('dashboard.title_ar'):</label>
                                            <input type="text" name="title_ar" id="title_ar" class="form-control"
                                                   value="{{ old('title_ar') }}"
                                                   placeholder="@lang('dashboard.title_ar')">
                                            @error('title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="title_en">@lang('dashboard.title_en'):</label>
                                            <input type="text" name="title_en" id="title_ar" class="form-control"
                                                   value="{{ old('title_en') }}"
                                                   placeholder="@lang('dashboard.title_en')">
                                            @error('title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="summernote2">@lang('dashboard.description_ar')</label>
                                                <textarea required name="desc_ar" class="form-control" id="summernote2"
                                                          placeholder="">{{ old('desc_ar') }}</textarea>
                                            </div>
                                            @error('desc_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="summernote">@lang('dashboard.description_en')</label>
                                                <textarea required name="desc_en" class="form-control" id="summernote"
                                                          placeholder="">{{ old('desc_en') }}</textarea>
                                            </div>
                                            @error('desc_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="image">@lang('dashboard.Images'):</label>
                                            <div class="input-images"></div>
                                            @error('images')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-primary mt-4 mb-4">@lang('dashboard.Create')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script>
        $(function () {
            $('#summernote2').summernote();
            $('#summernote').summernote();

            bsCustomFileInput.init();
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.input-images').imageUploader();
        });

    </script>
@endsection
