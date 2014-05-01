<?php

function check_plain($text) {
  return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$address = (isset($_GET['address']) && $_GET['address']) ? check_plain($_GET['address']) : '';

if ($address) {
  $address = urlencode($address);
  $url = 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=' . $address;

  $result = get_data($url);
  $result = json_decode($result, TRUE);

  $address = $result['results'][0]['formatted_address'];
  $location = $result['results'][0]['geometry']['location'];

  $lat = $location['lat'];
  $long = $location['lng'];

  $data = array('lat' => $lat, 'long' => $long, 'address' => $address);

  print json_encode($data);
}
