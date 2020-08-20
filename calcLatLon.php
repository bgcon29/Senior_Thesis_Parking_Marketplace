<?php

function geocode($address){
      $address = str_replace(" ","+",$address);
      $address = urlencode($address);

      $url = "https://maps.googleapis.com/maps/api/geocode/json?address='$address'&key=AIzaSyCi_co2Xc5maYq-Pzs62pqks1QVoG2FuNY";

      /*
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=AIzaSyCi_co2Xc5maYq-Pzs62pqks1QVoG2FuNY");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $xml = curl_exec($ch);

      $xml = new SimpleXMLElement($xml);
      $lat = $xml->result[0]->geometry[0]->location[0]->lat;
      $lng = $xml->result[0]->geometry[0]->location[0]->lat;


      curl_close($ch);
      */
      \
      $json = file_get_contents($url);

      $resp = json_decode($json, true);

      if(is_array($resp) && $resp['status']=='OK') {

        //$latitude = $resp['results'][0]['geometry']['location']['lat'];
        //$longitude = $resp['results'][0]['geometry']['location']['lng'];
        //$formatted_address = $resp['results'][0]['formatted_address'];


        $latitude = isset($resp['results'][0]['geometry']['location']['lat'])
        ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longitude = isset($resp['results'][0]['geometry']['location']['lng'])
        ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address'])
        ? $resp['results'][0]['formatted_address'] : "";

        if($latitude && $longitude && $formatted_address) {
          $data_arr = array();

          array_push(
            $data_arr,
            $latitude,
            $longitude,
            $formatted_address
          );
          return $data_arr;
      } else {
        return false;
      }
    }
      else {
        echo "ERROR: {$resp['status']}";
        return false;
      }

      }

 ?>
