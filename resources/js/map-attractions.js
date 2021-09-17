var mymap = L.map('map-attractions', {scrollWheelZoom:false}).setView([56.22, 11.72345], 8);
// var marker = L.marker([54.8455, 10.9871]).addTo(mymap);
// marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

for (var i = 0; i < mapAttractions.length; i++) {
  marker = new L.marker([mapAttractions[i][1], mapAttractions[i][2]])
    .bindPopup(mapAttractions[i][0])
    .addTo(mymap);
}

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibGFqbGV2IiwiYSI6ImNrdDFrbHhjbzBiazgyb3IwdGptbXhzczIifQ.kN9cx_Puw55CyoLzWQfsZQ'
}).addTo(mymap);