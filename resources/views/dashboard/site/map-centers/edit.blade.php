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
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <h6>@lang('dashboard.map-centers')</h6>
                                    <form action="{{ route('map-centers.update',$map->id) }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf @method('put')
                                        <div>
                                            <label for="title_ar">@lang('dashboard.title_ar'):</label>
                                            <input type="text" name="title_ar" id="title_ar" class="form-control"
                                                   value="{{ $map->title_ar }}"
                                                   placeholder="@lang('dashboard.title_ar')">
                                            @error('title_ar')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="title_en">@lang('dashboard.title_en'):</label>
                                            <input type="text" name="title_en" id="title_ar" class="form-control"
                                                   value="{{ $map->title_en }}"
                                                   placeholder="@lang('dashboard.title_en')">
                                            @error('title_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div id="map" style="position: relative; overflow: hidden; width: 100%;     height: 25rem;" ></div>
                                            <input type="hidden" id="latitude" name="latitude">
                                            <input type="hidden" id="longitude" name="longitude">
                                        </div>
                                        <br>
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
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });

            // Add a click event listener to the map
            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng); // Place a marker at the clicked location
            });

            // Function to place a marker on the map
            function placeMarker(location) {
                // Remove existing marker if present
                if (marker) {
                    marker.setMap(null);
                }

                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });

                // Set latitude and longitude values in input fields
                document.getElementById("latitude").value = location.lat();
                document.getElementById("longitude").value = location.lng();
            }

            // Function to handle errors in geolocation
            function handleLocationError(browserHasGeolocation, pos) {
                // Display an error message if geolocation fails
                var infoWindow = new google.maps.InfoWindow({map: map});
                infoWindow.setPosition(pos);
                infoWindow.setContent(browserHasGeolocation ?
                    'Error: The Geolocation service failed.' :
                    'Error: Your browser doesn\'t support geolocation.');
            }
        }
    </script>


    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDILA7Oj1pjycVqnFH21aUiBQVwJYVGYQs&loading=async&callback=initMap">
    </script>
@endsection
