@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 600px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Markers</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        var locations = [
            ["Kabupaten Keerom", -3.343,140.663],
            ["Kabupaten Jayapura", -3.053,139.960],
            ["Kabupaten Sarmi", -2.575,139.103],
            ["Kabupaten Mamberamo Raya", -2.433,137.829],
            ["Kabupaten Kepulauan Yapen", -1.779,136.357],
            ["Kabupaten Biak", -1.027,136.044],
            ];

            var map = L.map('map').setView([-2.482, 138.065], 8);
            mapLink =
            '<a href="http://openstreetmap.org">OpenStreetMap</a>';
            L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; ' + mapLink + ' Contributors',
                maxZoom: 18,
            }).addTo(map);

            for (var i = 0; i < locations.length; i++) {
            marker = new L.marker([locations[i][1], locations[i][2]])
                .bindPopup(locations[i][0])
                .addTo(map);
            }

        
    </script>
@endpush
