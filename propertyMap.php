<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
      var map;
      var markers = [];
      var infoWindow;
      var locationSelect;

        function initMap() {
          var start = {lat: 39.640867,  lng: -86.863782};
          map = new google.maps.Map(document.getElementById('map'), {
            center: start,
            zoom: 4,
            mapTypeId: 'roadmap',
            mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          infoWindow = new google.maps.InfoWindow();

          searchButton = document.getElementById("searchButton").onclick = searchLocations;

          locationSelect = document.getElementById("locationSelect");
          locationSelect.onchange = function() {
            var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
            if (markerNum != "none"){
              google.maps.event.trigger(markers[markerNum], 'click');
            }
          };
        }

       function searchLocations() {
         var address = document.getElementById("addressInput").value;
         var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: address}, function(results, status) {
           if (status == google.maps.GeocoderStatus.OK) {
            searchLocationsNear(results[0].geometry.location);
           } else {
             alert(address + ' not found');
           }
         });
       }

       function clearLocations() {
         infoWindow.close();
         for (var i = 0; i < markers.length; i++) {
           markers[i].setMap(null);
         }
         markers.length = 0;

         locationSelect.innerHTML = "";
         var option = document.createElement("option");
         option.value = "none";
         option.innerHTML = "See all results:";
         locationSelect.appendChild(option);
       }

       function searchLocationsNear(center) {
         clearLocations();

         var radius = document.getElementById('radiusSelect').value;
         var searchUrl = 'markerFinder.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
         downloadUrl(searchUrl, function(data) {
           var xml = parseXml(data);
           var markerNodes = xml.documentElement.getElementsByTagName("marker");
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markerNodes.length; i++) {
             var id = markerNodes[i].getAttribute("id");
             var name = markerNodes[i].getAttribute("name");
             var address = markerNodes[i].getAttribute("address");
             var distance = parseFloat(markerNodes[i].getAttribute("distance"));
             var price = parseInt(markerNodes[i].getAttribute("price"));
             var dates = markerNodes[i].getAttribute("dates");
             var spotsLeft = parseInt(markerNodes[i].getAttribute("capacityTotal")
                                          - markerNodes[i].getAttribute("rented"));
             var latlng = new google.maps.LatLng(
                  parseFloat(markerNodes[i].getAttribute("lat")),
                  parseFloat(markerNodes[i].getAttribute("lng")));
            var propID = parseInt(markerNodes[i].getAttribute("propID"));
            //var link = '<a href="send.php' + parseInt(markNodes[i].getAttribute("propID"))'">';

             createOption(name, distance, i, price, dates, spotsLeft, propID);
             createMarker(latlng, name, address, price, dates, spotsLeft, propID);
             bounds.extend(latlng);
           }
           map.fitBounds(bounds);
           locationSelect.style.visibility = "visible";
           locationSelect.onchange = function() {
             var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
             google.maps.event.trigger(markers[markerNum], 'click');
           };
         });
       }

       function createMarker(latlng, name, address, price, dates, spotsLeft, propID) {
         var html = "<b>" + name + "</b> <br/>" + address + "</b> <br/>"
         + "$" + price  + " | Spots Left: " + spotsLeft + "</b> <br/>" + " Date Available: " + dates
         + "</b> <br/>" + '<a href="send.php?id=' + propID + '">' + "View Property" + '</a><br/>' ;

          var marker = new google.maps.Marker({
            map: map,
            position: latlng
          });
          google.maps.event.addListener(marker, 'click', function() {

            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }

       function createOption(name, distance, num) {
          var option = document.createElement("option");
          option.value = num;
          option.innerHTML = name;
          locationSelect.appendChild(option);
       }

       function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
       }

       function parseXml(str) {
          if (window.ActiveXObject) {
            var doc = new ActiveXObject('Microsoft.XMLDOM');
            doc.loadXML(str);
            return doc;
          } else if (window.DOMParser) {
            return (new DOMParser).parseFromString(str, 'text/xml');
          }
       }

       function doNothing() {}
  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi_co2Xc5maYq-Pzs62pqks1QVoG2FuNY&callback=initMap">
    </script>

  </body>
</html>
