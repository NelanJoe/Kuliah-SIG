<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        .map {
            height: 100vh;
        }
    </style>

</head>

<body>
    <div class="map"></div>


    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        const mapElement = document.querySelector(".map")
        const map = L.map(mapElement).setView([-0.3155398750904368, 117.1371634207888], 5);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        const geojsonFeature = {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "nama": "Kampus A STT-NF"
                },
                "geometry": {
                    "coordinates": [
                        106.83271006867824,
                        -6.352869414097242
                    ],
                    "type": "Point"
                }
            }]
        };

        const geojson = L.geoJSON(geojsonFeature, {
            onEachFeature: function(feature, layer) {
                layer.bindPopup(feature.properties.nama);
            }
        }).bindPopup(function(layer) {
            return layer.feature.properties.nama
        }).addTo(map);
    </script>
</body>

</html>
