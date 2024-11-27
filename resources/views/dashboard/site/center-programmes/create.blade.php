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
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <h4>@lang('dashboard.center-programmes')</h4>
                                    <form action="{{ route('center-programmes.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <label for="type">@lang('dashboard.type'):</label>
                                        <select class="custom-select" name="type">
                                            <option value="programs" {{old('type')=='programs'?'selected':''}}>@lang('dashboard.programs')</option>
                                            <option    value="symposiums" {{old('type')=='symposiums'?'selected':''}}>@lang('dashboard.symposiums')</option>
                                        </select>
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

                                        <div class="form-group">
                                            <label for="exampleInputFile">@lang('dashboard.Image') </label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="image" type="file" class="custom-file-input"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="sort">@lang('dashboard.sort'):</label>
                                            <input type="number" name="sort" id="sort" class="form-control"
                                                   value="{{ old('sort')??0 }}"
                                                   placeholder="@lang('dashboard.sort')">
                                            @error('sort')
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
@endsection
