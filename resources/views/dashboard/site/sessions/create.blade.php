@extends('dashboard.core.app')
@section('title', __('titles.sessions'))
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
                            <h1>@lang('dashboard.sessions')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">@lang('dashboard.Structure')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.sessions')</li>
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
                                    <h4>@lang('dashboard.sessions')</h4>
                                    <form action="{{ route('sessions.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="program_id" value="{{$program_id}}">
                                        <div>
                                            <label for="name_ar">@lang('dashboard.Name') @lang('dashboard.ar'):</label>
                                            <input type="text" name="first_title_ar" id="name_ar" class="form-control"
                                                   value="{{ old('first_title_ar') }}"
                                                   placeholder="@lang('dashboard.Name') @lang('dashboard.ar')">
                                            @error('first_title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="name_en">@lang('dashboard.Name') @lang('dashboard.en'):</label>
                                            <input type="text" name="first_title_en" id="name_en" class="form-control"
                                                   value="{{ old('first_title_en') }}"
                                                   placeholder="@lang('dashboard.Name') @lang('dashboard.en')">
                                            @error('first_title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="title_ar">@lang('dashboard.title_ar'):</label>
                                            <input type="text" name="second_title_ar" id="title_ar" class="form-control"
                                                   value="{{ old('second_title_ar') }}"
                                                   placeholder="@lang('dashboard.title_ar')">
                                            @error('second_title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="title_en">@lang('dashboard.title_en'):</label>
                                            <input type="text" name="second_title_en" id="title_ar" class="form-control"
                                                   value="{{ old('tsecond_itle_en') }}"
                                                   placeholder="@lang('dashboard.title_en')">
                                            @error('second_title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="video_url">@lang('dashboard.video_url'):</label>
                                            <input type="text" name="url" id="video_url" class="form-control"
                                                   value="{{ old('url') }}"
                                                   placeholder="@lang('dashboard.video_url')">
                                            @error('url')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div>
                                            <div id="papers">
                                                <p class="h2">@lang('dashboard.scientific-papers')</p>

                                            </div>
                                            <div class="col-1">
                                                <div id="add_paper" style="cursor: pointer;"><i style="color: green"
                                                                                                class="nav-icon fas fa-plus-circle"></i>
                                                </div>
                                            </div>
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

    <script>
        let paper_index = 0;
        $('#add_paper').on('click', function () {
            paper_index++;
            var content = `<div class="paper">
            <div class="card-body ">
            <div>
                <label for="title_ar">@lang('dashboard.title_ar'):</label>
                <input type="text" name="papers[${paper_index}][second_title_ar]" id="title_ar_${paper_index}" class="form-control"
                    value=""
                    placeholder="@lang('dashboard.title_ar')">
            </div>
            <div>
                <label for="title_en">@lang('dashboard.title_en'):</label>
                <input type="text" name="papers[${paper_index}][second_title_en]" id="title_en_${paper_index}" class="form-control"
                    value="{{ old('title_en') }}"
                    placeholder="@lang('dashboard.title_en')">
            </div>
            <div>
                <label for="job_title_ar">@lang('dashboard.job_title') @lang('dashboard.ar'):</label>
                <input type="text" name="papers[${paper_index}][job_title_ar]" id="job_title_ar_${paper_index}" class="form-control"
                    value=""
                    placeholder="@lang('dashboard.job_title') @lang('dashboard.ar')">
            </div>
            <div>
                <label for="job_title_en">@lang('dashboard.job_title') @lang('dashboard.en'):</label>
                <input type="text" name="papers[${paper_index}][job_title_en]" id="job_title_en_${paper_index}" class="form-control"
                    value=""
                    placeholder="@lang('dashboard.job_title') @lang('dashboard.en')">
            </div>
            <div>
                <label for="writer_name">@lang('dashboard.writer_name'):</label>
                <input type="text" name="papers[${paper_index}][writer_name]" id="writer_name_${paper_index}" class="form-control"
                    value=""
                    placeholder="@lang('dashboard.writer_name')">
            </div>
            <div>
                <label for="view_link">@lang('dashboard.view_link'):</label>
                {{--<input type="text" name="papers[${paper_index}][url]" id="view_link_${paper_index}" class="form-control"--}}
                {{--    value=""--}}
                {{--    placeholder="@lang('dashboard.view_link')">--}}
                <div class="input-group">
                                            <div class="custom-file">
                                                <input name="papers[${paper_index}][url]" type="file" class="custom-file-input"
                                                       id="view_link_${paper_index}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
            </div>
            <div class="col-1">
                <div class="delete_content" style="cursor: pointer;"><i style="color:red" class="nav-icon fas fa-minus-circle"></i></div>
            </div>
            </div>
        </div>`;
            $('#papers').append(content);
        });

        $('#papers').on('click', '.delete_content', function (e) {
            $(this).closest('.paper').remove();
        });
    </script>



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
@endsection
