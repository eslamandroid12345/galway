@extends('dashboard.core.app')
@section('title', __('titles.members'))
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
                            <h1>@lang('dashboard.members')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">@lang('dashboard.Structure')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.members')</li>
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
                                    <h4>@lang('dashboard.members')</h4>
                                    <form action="{{ route('members.update',$member->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf @method('put')
                                        <div>
                                            <label for="name_ar">@lang('dashboard.Name') @lang('dashboard.ar'):</label>
                                            <input type="text" name="name_ar" id="name_ar" class="form-control"
                                                   value="{{ $member->name_ar }}"
                                                   placeholder="@lang('dashboard.Name') @lang('dashboard.ar')">
                                            @error('name_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="name_en">@lang('dashboard.Name') @lang('dashboard.en'):</label>
                                            <input type="text" name="name_en" id="name_en" class="form-control"
                                                   value="{{ $member->name_en }}"
                                                   placeholder="@lang('dashboard.Name') @lang('dashboard.en')">
                                            @error('name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="job_title_ar">@lang('dashboard.job_title') @lang('dashboard.ar'):</label>
                                            <input type="text" name="job_title_ar" id="job_title_ar" class="form-control"
                                                   value="{{ $member->job_title_ar }}"
                                                   placeholder="@lang('dashboard.job_title') @lang('dashboard.ar')">
                                            @error('job_title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="job_title_en">@lang('dashboard.job_title') @lang('dashboard.en'):</label>
                                            <input type="text" name="job_title_en" id="job_title_en" class="form-control"
                                                   value="{{ $member->job_title_en }}"
                                                   placeholder="@lang('dashboard.job_title') @lang('dashboard.en')">
                                            @error('job_title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="summernote2">@lang('dashboard.description_ar')</label>
                                                <textarea required name="desc_ar" class="form-control" id="summernote2" placeholder="">{{ $member->desc_ar }}</textarea>
                                            </div>
                                            @error('desc_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="summernote">@lang('dashboard.description_en')</label>
                                                <textarea required name="desc_en" class="form-control" id="summernote" placeholder="">{{ $member->desc_en }}</textarea>
                                            </div>
                                            @error('desc_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">@lang('dashboard.Image') </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="image" type="file" class="custom-file-input"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset($member->image?->path)}}" width="200px" height="auto">
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-primary mt-4 mb-4">@lang('dashboard.Edit')</button>
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
{{--    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>--}}
{{--    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>--}}

{{--    <script>--}}
{{--        $(function () {--}}
{{--            $('#summernote2').summernote();--}}
{{--            $('#summernote').summernote();--}}

{{--            bsCustomFileInput.init();--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        $(document).ready(function () {
            $('.input-images').imageUploader();
        });

    </script>
@endsection
