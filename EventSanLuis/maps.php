<!DOCTYPE html>
<html>
  <head>
    <title>Ubicacion de las mamparas</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="Shortcut Icon" href="images/icon.ico" type="image/x-icon" />

    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

    <script>

var map;
function initMap() {
var m1 = {lat:  22.125073, lng:   -100.957424};
var m2 = {lat: 22.205664,  lng:  -100.969298};
var m3 = {lat: 22.1243004, lng: -100.9478213};
var m4 = {lat:  22.1345362,lng:  -100.9628181 };
var m5 = {lat:  22.1502174,lng: -100.9812016};
var m6 = {lat:  22.15305, lng:  -100.9787807};

  map = new google.maps.Map(document.getElementById('map'), { center: {lat: 22.15305, lng: -100.9787807},zoom: 13});
  
var contentString1 = '<div id="content">'+ '<div id="siteNotice">'+ '</div>'+ '<h1 id="firstHeading" class="firstHeading">Mampara 1</h1>'+ '<div id="bodyContent">'+'</div>'+ '</div>';
var contentString2 = '<div id="content">'+ '<div id="siteNotice">'+ '</div>'+ '<h1 id="firstHeading" class="firstHeading">Mampara 2</h1>'+ '<div id="bodyContent">'+'</div>'+ '</div>';
var contentString3 = '<div id="content">'+ '<div id="siteNotice">'+ '</div>'+ '<h1 id="firstHeading" class="firstHeading">Mampara 3</h1>'+ '<div id="bodyContent">'+'</div>'+ '</div>';
var contentString4 = '<div id="content">'+ '<div id="siteNotice">'+ '</div>'+ '<h1 id="firstHeading" class="firstHeading">Mampara 4</h1>'+ '<div id="bodyContent">'+'</div>'+ '</div>';
var contentString5 = '<div id="content">'+ '<div id="siteNotice">'+ '</div>'+ '<h1 id="firstHeading" class="firstHeading">Mampara 5</h1>'+ '<div id="bodyContent">'+'</div>'+ '</div>';
var contentString6 = '<div id="content">'+ '<div id="siteNotice">'+ '</div>'+ '<h1 id="firstHeading" class="firstHeading">Mampara 6</h1>'+ '<div id="bodyContent">'+'</div>'+ '</div>';

  var infowindow1 = new google.maps.InfoWindow({ content: contentString1 });
  var infowindow2 = new google.maps.InfoWindow({ content: contentString2 });
  var infowindow3 = new google.maps.InfoWindow({ content: contentString3 });
  var infowindow4 = new google.maps.InfoWindow({ content: contentString4});
  var infowindow5 = new google.maps.InfoWindow({ content: contentString5 });
  var infowindow6 = new google.maps.InfoWindow({ content: contentString6 });

 var marker1 = new google.maps.Marker({ position: m1,map: map, title: 'Mampara 1'});
 var marker2 = new google.maps.Marker({ position: m2,map: map, title: 'Mampara 2'});
 var marker3 = new google.maps.Marker({ position: m3,map: map, title: 'Mampara 3'});
 var marker4 = new google.maps.Marker({ position: m4,map: map, title: 'Mampara 4'});
 var marker5 = new google.maps.Marker({ position: m5,map: map, title: 'Mampara 5'});
 var marker6 = new google.maps.Marker({ position: m6,map: map, title: 'Mampara 6'});

 marker1.addListener('click', function() { infowindow1.open(map, marker1); });
 marker2.addListener('click', function() { infowindow2.open(map, marker2); });
marker3.addListener('click', function() { infowindow3.open(map, marker3); });
marker4.addListener('click', function() { infowindow4.open(map, marker4); });
marker5.addListener('click', function() { infowindow5.open(map, marker5); });
marker6.addListener('click', function() { infowindow6.open(map, marker6); });
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6D1xTiS7Nhk_IRYNw9qmyzBc6zRrdieM&callback=initMap"
        async defer></script>
  </body>
</html>