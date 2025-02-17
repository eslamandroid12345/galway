@extends('dashboard.core.app')
@section('title', __('titles.header_footer'))
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{route('header-footer.store')}}" method="post" autocomplete="off"
                              enctype="multipart/form-data">
                            <div class="card-header">
                                <h2 class="card-title">@lang('dashboard.website_info')</h2>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-9" style="align-content: center;display: grid;">
                                        <div class="form-group" style="width: 100%;">
                                            <label for="exampleInputFile">@lang('dashboard.logo')</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="en[logo]" type="hidden" value="file_120">
                                                    <input name="ar[logo]" type="hidden" value="file_120">
                                                    <input name="file[120]" type="file" class="custom-file-input"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    <input name="old_file[120]" type="hidden"
                                                           value="{{ $content['ar']['logo'] ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <img src="{{ $content['ar']['logo'] ?? null }}" style="width: 60%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9" style="align-content: center;display: grid;">
                                        <div class="form-group" style="width: 100%;">
                                            <label for="exampleInputFile">@lang('dashboard.fav_icon')</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="en[fav_icon]" type="hidden" value="file_121">
                                                    <input name="ar[fav_icon]" type="hidden" value="file_121">
                                                    <input name="file[121]" type="file" class="custom-file-input"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    <input name="old_file[121]" type="hidden"
                                                           value="{{ $content['ar']['fav_icon'] ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <img src="{{ $content['ar']['fav_icon'] ?? null }}" style="width: 60%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-9" style="align-content: center;display: grid;">
                                        <div class="form-group" style="width: 100%;">
                                            <label for="exampleInputFile">@lang('dashboard.logo_footer')</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="en[logo_footer]" type="hidden" value="file_122">
                                                    <input name="ar[logo_footer]" type="hidden" value="file_122">
                                                    <input name="file[122]" type="file" class="custom-file-input"
                                                           id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    <input name="old_file[122]" type="hidden"
                                                           value="{{ $content['ar']['logo_footer'] ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <img src="{{ $content['ar']['logo_footer'] ?? null }}" style="width: 60%">
                                    </div>
                                </div>
                                <hr>
                                <br><br><br>
                                <div>
                                    <p class="h4">@lang('dashboard.contacts')</p>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputMainTitle2">@lang('dashboard.location')</label>
                                            <input name="all[contacts][location]"
                                                   value="{{$content['en']['contacts']['location']??null}}" type="text"
                                                   class="form-control" id="exampleInputMainTitle2" placeholder="">
                                        </div>
                                    </div>
                                    <p class="h5">@lang('dashboard.phones')</p>
                                    <div id="phones">
                                        @if(isset($content['en']['contacts']['phones']))
                                            @foreach($content['en']['contacts']['phones'] as $k => $phone)
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputMainTitle2">@lang('dashboard.phone') {{++$k}}</label>
                                                            <input name="all[contacts][phones][]"
                                                                   value="{{$phone??null}}" type="number"
                                                                   class="form-control" id="exampleInputMainTitle2"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="delete_content" style="cursor: pointer;"><i
                                                                style="color:red"
                                                                class="nav-icon fas fa-minus-circle"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-1">
                                        <div id="add_phone" style="cursor: pointer;"><i style="color: green"
                                                                                        class="nav-icon fas fa-plus-circle"></i>
                                        </div>
                                    </div>
                                    <div id="emails">
                                        <p class="h5">@lang('dashboard.emails')</p>
                                        @if(isset($content['en']['contacts']['emails']))
                                            @foreach($content['en']['contacts']['emails'] as $k => $email)
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="exampleInputMainTitle2">@lang('dashboard.email') {{++$k}}</label>
                                                            <input name="all[contacts][emails][]"
                                                                   value="{{$email??null}}" type="text"
                                                                   class="form-control" id="exampleInputMainTitle2"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="delete_content" style="cursor: pointer;"><i
                                                                style="color:red"
                                                                class="nav-icon fas fa-minus-circle"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="col-1">
                                        <div id="add_email" style="cursor: pointer;"><i style="color: green"
                                                                                        class="nav-icon fas fa-plus-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div id="social_accounts">
                                    <p class="h4">@lang('dashboard.social_media')</p>
                                    @if(isset($content['en']['social']))
                                        @foreach($content['en']['social'] as $key => $social)
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <input name="en[social][{{$key}}][icon]" type="hidden"
                                                               value="file_{{ 1000 + $key }}">
                                                        <input name="ar[social][{{$key}}][icon]" type="hidden"
                                                               value="file_{{ 1000 + $key }}">
                                                        <input name="file[{{ 1000 + $key }}]" type="file"
                                                               class="custom-file-input" id="exampleInputFile">
                                                        <input name="old_file[{{ 1000 + $key }}]" type="hidden"
                                                               value="{{$content['en']['social'][$key]['icon'] ?? ''}}">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input required name="all[social][{{$key}}][link]"
                                                           value="{{$social['link']}}" type="text" class="form-control"
                                                           id="exampleInputMainTitle2" placeholder="">
                                                </div>
                                                <div class="col-1">
                                                    <img src="{{$content['en']['social'][$key]['icon'] ?? ''}}"
                                                         style="width: 60%">
                                                </div>
                                                <div class="col-1">
                                                    <div class="delete_content" style="cursor: pointer;"><i
                                                            style="color:red" class="nav-icon fas fa-minus-circle"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif

                                </div>
                                <div class="col-1">
                                    <div id="add_social" style="cursor: pointer;"><i style="color: green"
                                                                                     class="nav-icon fas fa-plus-circle"></i>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputMainTitle1"> @lang('dashboard.rights_statement') @lang('dashboard.en')</label>
                                            <input required name="en[rights_statement]" value="{{$content['en']['rights_statement']??null}}"
                                                   type="text" class="form-control" id="exampleInputMainTitle1"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label
                                                for="exampleInputMainTitle2">@lang('dashboard.rights_statement') @lang('dashboard.ar')</label>
                                            <input name="ar[rights_statement]" value="{{$content['ar']['rights_statement']??null}}"
                                                   type="text" class="form-control" id="exampleInputMainTitle2"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-dark">@lang('dashboard.Publish')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('js_addons')
    <script>
        $('.row').on('click', '.delete_content', function (e) {
            $(this).parent().parent().remove();
        });
        let index = {{ isset($content['en']['contacts']['phones']) ? max(array_keys($content['en']['contacts']['phones'])) : 0 }};
        $(document).ready(function () {
            $('#add_phone').click(function () {
                index++
                var newPhone = `<div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputMainTitle2">@lang('dashboard.phone')</label>
                                                        <input name="all[contacts][phones][]"  type="number" class="form-control" id="exampleInputMainTitle2" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="delete_content" style="cursor: pointer;"><i
                                                            style="color:red" class="nav-icon fas fa-minus-circle"></i>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>`;
                $('#phones').append(newPhone);
            });
        });
        let email_index = {{ isset($content['en']['contacts']['emails']) ? max(array_keys($content['en']['contacts']['emails'])) : 0 }};
        $(document).ready(function () {
            $('#add_email').click(function () {
                index++
                var newEmail = `<div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputMainTitle2">@lang('dashboard.email')</label>
                                                        <input name="all[contacts][emails][]"  type="text" class="form-control" id="exampleInputMainTitle2" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="delete_content" style="cursor: pointer;"><i
                                                            style="color:red" class="nav-icon fas fa-minus-circle"></i>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>`;
                $('#emails').append(newEmail);
            });
        });
        let link_index = {{ isset($content['en']['links']) ? max(array_keys($content['en']['links'])) : 0 }};
        $(document).ready(function () {
            $('#add_link').click(function () {
                link_index++
                var newLink = ` <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputMainTitle2">@lang('dashboard.link') @lang('dashboard.title_ar')  ${link_index}</label>
                                                            <input name="ar[links][${link_index}][title]" type="text" class="form-control" id="exampleInputMainTitle2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputMainTitle2">@lang('dashboard.link') @lang('dashboard.title_en') ${link_index}</label>
                                                            <input name="en[links][${link_index}][title]" type="text" class="form-control" id="exampleInputMainTitle2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputMainTitle2">@lang('dashboard.link') ${link_index}</label>
                                                            <input name="all[links][${link_index}][link]"  type="text" class="form-control" id="exampleInputMainTitle2" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="delete_content" style="cursor: pointer;"><i
                                                                style="color:red" class="nav-icon fas fa-minus-circle"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>`;
                $('#links').append(newLink);
            });
        });
        let social_index = {{ isset($content['en']['social']) ? max(array_keys($content['en']['social'])) : 0  }};
        $('#add_social').on('click', function () {
            social_index++;
            var content = `<div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <input name="en[social][${social_index}][icon]" type="hidden" value="file_${social_index + 2000}">
                                                    <input name="ar[social][${social_index}][icon]" type="hidden" value="file_${social_index + 2000}">
                                                    <input name="file[${social_index + 2000}]" type="file" class="custom-file-input" id="exampleInputFile">
                                                    <input name="old_file[${social_index + 2000}]" type="hidden" >
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <input required name="all[social][${social_index}][link]" type="text" class="form-control" id="exampleInputMainTitle2" placeholder="">
                                            </div>
                                            <div class="col-1">
                                                <div class="delete_content" style="cursor: pointer;"><i style="color:red" class="nav-icon fas fa-minus-circle"></i></div>
                                            </div>
                                        </div>`;

            $('#social_accounts').append(content);

        });

    </script>
@endsection
