import { citiesGeoJSON, collegesGeoJSON } from "./data.js";

// Getting html element for map
const mapElement = document.querySelector(".map");

const osm = L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: "© OpenStreetMap",
});

const osmHOT = L.tileLayer(
  "https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png",
  {
    maxZoom: 19,
    attribution:
      "© OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team hosted by OpenStreetMap France",
  }
);

const layerCities = L.geoJSON(citiesGeoJSON, {
  onEachFeature: (feature, layer) => {
    layer.bindPopup(`
      <strong>Kampus: ${feature.properties.nama}</strong>
    `);
  },
});

const layerColleges = L.geoJSON(collegesGeoJSON, {
  onEachFeature: (feature, layer) => {
    layer.bindPopup(`
        <strong>${feature.properties.nama}</strong>
        <br/> 
        ${feature.properties.kota}
        <br/> 
        ${feature.properties.alamat}
      `);
  },
});

const baseMaps = {
  OpenStreetMap: osm,
  "OpenStreetMap.HOT": osmHOT,
};

const overlayMaps = {
  Cities: layerCities,
  Colleges: layerColleges,
};

const map = L.map(mapElement, {
  center: [-6.4025, 106.7942],
  zoom: 13.51,
  layers: [osm, layerColleges],
});

// Add layer control
L.control.layers(baseMaps, overlayMaps).addTo(map);
