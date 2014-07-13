<!doctype html>
<html>
  <head>
    <title>Address to LatLong converter</title>
    <meta charset="utf-8">
    <style>
      html,
      body {
        height: 100%;
        text-align: center;
        white-space: nowrap;
        margin: 0;
      }

      #page {
        display: inline-block;
        vertical-align: middle;
        text-align: left;
        white-space: normal;
      }

      body:before{
        content: '';
        display: inline-block;
        height: 100%;
        width: 0;
        vertical-align: middle;
        margin-right: -.3em;
      }

      input {
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 300;
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 18px;
        text-align: center;
      }

      #address,
      #address-result {
        width: 400px;
      }

      #lat,
      #long {
        width: 187px;
      }

      #address {
        text-align: left;
      }

      #address-result {
        font-size: 14px;
      }
    </style>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
      var lat = $('#lat');
      var long = $('#long');
      var address = $('#address-result');

      $('#address').bind('keyup', function() {
        var that = $(this);

        $.ajax({
          url: 'geocode.php?address=' + that.val(),
          dataType: 'json',
          success: function(data) {
            lat.val(data.lat);
            long.val(data.long);
            address.val(data.address);
          }
        });

      });
    });
    </script>
  </head>
  <body>
    <div id="page">
      <form>
        <input type="text" placeholder="Enter an address" id="address" autofocus required />
        <div>
          <input type="text" placeholder="Latitude" id="lat" name="lat" readonly />
          <input type="text" placeholder="Longitude" id="long" name="long" readonly />
        </div>
        <div>
          <input type="text" placeholder="Address result" id="address-result" disabled />
        </div>
      </form>
    </div>
    <a href="https://github.com/yannickoo/address-to-latlng-converter"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
  </body>
</html>
