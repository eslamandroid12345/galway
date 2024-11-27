@extends('dashboard.core.app')
@section('title', __('titles.lectures'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.lectures')</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">@lang('dashboard.lectures')</h3>
                            @permission('programs-create')
                            <div class="card-tools">
                                <a href="{{route('lectures.create',$program_id)}}"
                                   class="btn  btn-dark">@lang('dashboard.Create')</a>
                            </div>
                            @endpermission
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>@lang('dashboard.Name')</th>
                                    <th>@lang('dashboard.Title')</th>
                                    <th>@lang('dashboard.writer_name')</th>
                                    <th>@lang('dashboard.job_title')</th>
                                    <th>@lang('dashboard.Operations')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($lectures as $key => $lecture)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{$lecture->t('first_title')}}</td>
                                        <td>{{$lecture->t('second_title')}}</td>
                                        <td>{{$lecture->writer_name}}</td>
                                        <td>{{$lecture->t('job_title')}}</td>
                                        <td>
                                            <div class="operations-btns" style="">
                                                @permission('programs-update')
                                                <a href="{{ route('lectures.edit', $lecture->id) }}"
                                                   class="btn  btn-dark">@lang('dashboard.Edit')</a>
                                                @endpermission
                                                @permission('programs-read')
                                                <a href="{{ route('lectures.show', $lecture->id) }}"
                                                   class="btn  btn-dark">@lang('dashboard.Show')</a>
                                                @endpermission

                                                @permission('programs-delete')
                                                <button class="btn btn-danger waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target="#delete-modal{{$key}}">@lang('dashboard.Delete')</button>
                                                <div id="delete-modal{{$key}}" class="modal fade modal2 "
                                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                     aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content float-left">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">@lang('dashboard.delete')</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>@lang('dashboard.sure_delete')</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal"
                                                                        class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                                    @lang('dashboard.close')
                                                                </button>
                                                                <form
                                                                    action="{{route('lectures.destroy' , $lecture->id)}}"
                                                                    method="post">
                                                                    @csrf
                                                                    {{method_field('DELETE')}}
                                                                    <button type="submit"
                                                                            class="btn btn-danger">@lang('dashboard.Delete')</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endpermission
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    @include('dashboard.core.includes.no-entries', ['columns' => 6])
                                @endforelse
                                </tbody>
                            </table>
                            {{$lectures->links()}}
                        </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
