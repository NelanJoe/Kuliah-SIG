<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peta Provinsi Di Indonesia</title>


    {{-- Source Font from Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">



    {{-- Leaflet CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <style>
        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        :root {
            font-family: "Poppins", serif;
        }

        .map-header {
            text-align: center;
            padding: 22px 0;
        }

        .map-wrapper {
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .map-view {
            height: 450px;
            width: 85vw;
            border-radius: 10px;
        }


        @media only screen and (max-width: 768px) {
            .map-view {
                width: 90vw;
            }
        }
    </style>
</head>

<body>


    <div class="map-header">
        <h2 class="map-title">Peta Provinsi Di Indonesia</h2>
        <p>Source Data: <i><a href="https://github.com/yusufsyaifudin/wilayah-indonesia" target="_blank">Github Yusuf
                    Syaifudin</a></i></p>
    </div>

    <div class="map-wrapper">
        <div class="map-view"></div>
    </div>


    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        const mapElement = document.querySelector(".map-view")
        const map = L.map(mapElement).setView([-0.3155398750904368, 117.1371634207888], 5);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);



        const provinces = @json($list_provinsi);
        provinces.map((item) => {
            const {
                name,
                latitude,
                longitude
            } = item;

            const marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup(name);
        });
    </script>
</body>

</html>