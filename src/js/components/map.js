const mapElement = document.getElementById('map');

if ( mapElement ) {
  const lat = Number(mapElement.dataset.lat);
  const lng = Number(mapElement.dataset.lng);

  function initMap() {
    const position = {lat, lng};

    const map = new google.maps.Map(mapElement, {
      zoom: 18,
      center: position,
      zoomControl: false,
      mapTypeControl: false,
      scaleControl: false,
      streetViewControl: false,
      rotateControl: false,
      fullscreenControl: true,
    });

    new google.maps.Marker({position, map});
  }

  window.initMap = initMap;
} else {
  window.initMap = () => console.log('Configurar Google Map');
}
