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
  </body>
</html>
