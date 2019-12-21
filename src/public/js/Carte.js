class Carte {
  constructor(markers) {
    this.markers = markers;
    $('#container-map').show();
    this.map = L.map("map", {
      center: [-8.80507876834652, 115.11340369779452],
      zoom: 1,
      gestureHandling: true,
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(this.map);

    this.initMarkers();
  }

  initMarkers() {
    if (this.markerLayer) {
      this.markerLayer.clearLayers();
    }
    this.markerLayer = L.layerGroup();
    for (let i = 0; i < this.markers.length; i++) {
      L.marker([this.markers[i].position.lat, this.markers[i].position.lng], {icon: this.colorMarker()})
        .addTo(this.markerLayer);
    }
 
    this.map.addLayer(this.markerLayer)

  }

  colorMarker() {
    return L.icon({
      iconUrl: '/public/images/icon.png',
      iconSize: [38, 50],
    });
  }

}



