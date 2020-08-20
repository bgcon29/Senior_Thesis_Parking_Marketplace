<?php
session_start();
require('dbc.php');

if(isset($_SESSION['Username'])) {
include("userHeader.php");
} else {
include("header.php");
}
/*
if(isset($_GET['addressInput']) && $_GET['addressInput'] !== ' ' && isset($_GET['radius'])) {
  $search = $_GET['addressInput'];
  $radius = $_GET['radius'];
  $_SESSION['searchContent'] = $search;
}   */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Map</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<main>
  <center>

    </div>
  </center>
  <center>

  <body style="" onload="initMap()">
    <center>
        <div class="resultPageSearchBar">
            <form id="searchBar" name="searchBar" method="get" style="height:60px">
              <input type="text" name="addressInput" id="addressInput" class="search" dir="ltr" placeholder="Search by City" required>
              <select name="radiusSelect" id="radiusSelect" formid="searchBar" dir="ltr" required>
                <option value="" selected="selected">Radius</option>
                <option value="30">30 miles </option>
                <option value="15">15 miles</option>
                <option value="10">10 miles</option>
                <option value="5">5 miles</option>
              </select>

              <input type="button" id="searchButton" class="submit" value="Find Tailgate Spots">
</form>
            <div><select id="locationSelect" name="locationSelect" style=" visibility: visible"></select></div>


        </div>
        </center>

<div class="pageText">

<center>
          <div id="map" ></div>

    <div id="map" ></div>

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

          //searchButton = document.forms["searchBar"]["searchButton"].onclick = searchLocations;


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
         //var address = document.form["searchBar"]["addressInput"].value;

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
         //var radius = document.form["searchBar"]["radiusSelect"].value;

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
         var html = "<b>" + name + "</b> <br/>" + address + "</input> <br/>"
         + "$" + price  + " | Spots Left: " + spotsLeft + "</input> <br/>" + " Date Available: " + dates
         + "</input> <br/>" + '<a href="send.php?id=' + propID + '">' + "View Property" + '</a><br/>' ;

         var markerPrice = "<b>"
          var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            label: {
              text: "$" + price,
              fontSize: "10px",
              fontWeight: "bold",
              color: "black"
            }
          });
          google.maps.event.addListener(marker, 'click', function() {

            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
          markers.push(marker);
        }

       function createOption(name, distance, num, price) {
          var option = document.createElement("option");
          option.value = num;
          var dist = distance.toFixed(2);
          option.innerHTML = name + " | $"+ price + " | " + dist + " miles";
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

</script>

</center>


</body>
</main>
</html>
