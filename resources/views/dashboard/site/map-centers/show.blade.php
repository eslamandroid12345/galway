@extends('dashboard.core.app')
@section('title', __('titles.map-centers'))
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
                            <h1>@lang('dashboard.map-centers')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('/')}}">@lang('dashboard.Structure')</a></li>
                                <li class="breadcrumb-item active">@lang('dashboard.map-centers')</li>
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
                                <h3 class="card-title">@lang('dashboard.map-centers')</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <p class="lead">{{$map->name}}</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                            <tr>
                                                <th style="width:50%">@lang('dashboard.title_ar'):</th>
                                                <td>{{$map->title_ar}}</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%">@lang('dashboard.title_en'):</th>
                                                <td>{{$map->title_en}}</td>
                                            </tr>
                                            @isset($map->longitude)
                                                <tr>
                                                    <div id="map" style="position: relative; overflow: hidden; width: 100%;     height: 25rem;" ></div>
                                                </tr>
                                            @endisset


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
    <script>
        var map;
        var marker;

        function initMap() {
            var myLatLng = { lat: {{$map->latitude}}, lng: {{$map->longitude}} };

            // Create a map centered at the specified LatLng
            map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 8
            });

            // Place a marker at the specified LatLng
            marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }
    </script>




    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDILA7Oj1pjycVqnFH21aUiBQVwJYVGYQs&loading=async&callback=initMap">
    </script>
@endsection

