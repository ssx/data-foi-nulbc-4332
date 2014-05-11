<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Empty Commercial Properties in Newcastle under Lyme</title>
    <meta name="description" content="jHERE - Heatmaps">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="jhere.min.js"></script>
    <style type="text/css">
	html,body, #mapContainer {
	  font-family:sans-serif;
	  background:#fff;
	  color:#444;
	  height:100%;
	  padding:0;
	  margin:0;
	}
	</style>
  </head>
  <body>
    <div id="mapContainer"></div>
    <script type="text/javascript">
	function number_format(number, decimals, dec_point, thousands_sep) {
	  number = (number + '')
	    .replace(/[^0-9+\-Ee.]/g, '');
	  var n = !isFinite(+number) ? 0 : +number,
	    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	    s = '',
	    toFixedFix = function (n, prec) {
	      var k = Math.pow(10, prec);
	      return '' + (Math.round(n * k) / k)
	        .toFixed(prec);
	    };
	  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
	  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
	    .split('.');
	  if (s[0].length > 3) {
	    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	  }
	  if ((s[1] || '')
	    .length < prec) {
	    s[1] = s[1] || '';
	    s[1] += new Array(prec - s[1].length + 1)
	      .join('0');
	  }
	  return s.join(dec);
	}

	$(window).on('load', function() {
		map = $('#mapContainer').jHERE({
			center: [53.0099997, -2.2209487],
			zoom: 11,
			type: 'smart'
		});

		$.getJSON("NULBC_4332.json", function( data ) {
			$.each( data, function( key, val ) {
				if (val.latitude && val.longitude)
				{
					map.jHERE('marker', [parseFloat(val.latitude), parseFloat(val.longitude)], {
				    	icon: 'https://maps.google.com/mapfiles/kml/paddle/red-circle-lv.png',
				        anchor: {x: 0, y: 0},
				        click: function(){
				        	alert("Ratable Value: £" + number_format(val.property_value) + "\n\n" + val.address);
				        }
				    });
			    }
			});
		});
	});
    </script>
  </body>
</html>