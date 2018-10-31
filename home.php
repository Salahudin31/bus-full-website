<?php
	require 'core/init.php'; if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
	ob_start('ob_gzhandler');
	else
	ob_start();
	date_default_timezone_set("Asia/Jakarta");
	if (isset($_SESSION['loginid'])) 
	{
		$user 		= $users->userdata($_SESSION['loginid']);
		$nama_user 	= ucwords(strtolower($user['nama_user']));
		if ($user['level'] == "admin")
		{
			$tittle = "Admin";
		} elseif ($user['level'] == "pimpinan")
		{
			$tittle = "Pimpinan";
		} elseif ($user['level'] == "agen")
		{
			$tittle = "Agen";
		}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="assets/css2/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
  <script type="text/javascript" charset="utf8" src="assets/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" charset="utf8" src="assets/js/jquery.dataTables.js"></script>	

<script>
	$(document).ready(function() {
		var table = $('#datatables').DataTable({
			paging: false
		});
	} );
	$(document).ready(function() {
		var table = $('#datatables1').DataTable({
			paging: false
		});
	} );	
	$(document).ready(function() {
		var table = $('#datatables2').DataTable({
			paging: false
		});
	} );
	$(document).ready(function() {
		var table = $('#datatables3').DataTable({
			paging: false
		});
	} );
	$(document).ready(function() {
		var table = $('#datatables4').DataTable({
			paging: false
		});
	} );
	$(document).ready(function() {
		var table = $('#datatablesS').DataTable({
			paging: false,
			order: [[3,"DESC"]]
		});
	} );
	$(document).ready(function() {
		var table = $('#datatablesB').DataTable({
			paging: false,
			order: [[2,"DESC"]]
		});
	} );	
</script>
	
	<title>
		<?php 
			if (isset($_SESSION['loginid'])) 
			{
				echo $tittle;
			}
		 ?>
	</title>
	<style>
		.red{
			background-color: #FE8176;
		}
		.green{
			background-color: #B0DC7A;
		}
		.yellow{
			background-color: #FEFE9A;
		}
		.blue{
			background-color: #678FFE;
		}
		.black{
			background-color: #000;
			color: white!important;
		}
		.white{
			background-color: #fff;
		}
		.p-05 {
			padding: .1rem 1rem;
		}
		.d-22 {
			display: none;
		}
	</style>
	
</head>
<body>

  <div class="container-scroller">
		<?php include ('_nav.php'); ?>
		 
		 <div class="container-fluid page-body-wrapper">
		
			<?php include ('_sidebar.php'); ?>

			<div class="main-panel">

				<?php include ('_isi.php');?>
						
				<footer class="footer">
	        <div class="container-fluid clearfix">
	          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
	            <a href="#" target="_blank">Salahudin-wiv</a>. All rights reserved.</span>
	          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
	            <i class="mdi mdi-heart text-danger"></i>
	          </span>
	        </div>
	      </footer>

	     </div>
		</div>
	</div>


  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="assets/js2/jquery-ui.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
  <script src="https://maps.google.com/maps/api/js"></script>
	<script type="text/javascript">
      	function custom_map() {
		    var var_location = new google.maps.LatLng(40.725118, -73.997699);
		    var var_mapoptions = {
		        center: var_location,
		        zoom: 14,
		        styles: [
		            {
		                "featureType": "administrative",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "off"
		                    }
		                ]
		            },
		            {
		                "featureType": "poi",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "simplified"
		                    }
		                ]
		            },
		            {
		                "featureType": "road",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "simplified"
		                    }
		                ]
		            },
		            {
		                "featureType": "water",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "simplified"
		                    }
		                ]
		            },
		            {
		                "featureType": "transit",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "simplified"
		                    }
		                ]
		            },
		            {
		                "featureType": "landscape",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "simplified"
		                    }
		                ]
		            },
		            {
		                "featureType": "road.highway",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "off"
		                    }
		                ]
		            },
		            {
		                "featureType": "road.local",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "on"
		                    }
		                ]
		            },
		            {
		                "featureType": "road.highway",
		                "elementType": "geometry",
		                "stylers": [
		                    {
		                        "visibility": "on"
		                    }
		                ]
		            },
		            {
		                "featureType": "road.arterial",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "visibility": "off"
		                    }
		                ]
		            },
		            {
		                "featureType": "water",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "color": "#5f94ff"
		                    },
		                    {
		                        "lightness": 26
		                    },
		                    {
		                        "gamma": 5.86
		                    }
		                ]
		            },
		            {
		                "featureType": "road.highway",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "weight": 0.6
		                    },
		                    {
		                        "saturation": -85
		                    },
		                    {
		                        "lightness": 61
		                    }
		                ]
		            },
		            {
		                "featureType": "landscape",
		                "elementType": "all",
		                "stylers": [
		                    {
		                        "hue": "#0066ff"
		                    },
		                    {
		                        "saturation": 74
		                    },
		                    {
		                        "lightness": 100
		                    }
		                ]
		            }
		        ]
		    };
		    var var_map = new google.maps.Map(document.getElementById("map-container-2"),
		        var_mapoptions);

		    var var_marker = new google.maps.Marker({
		        position: var_location,
		        map: var_map,
		        title: "New York"
		    });
		}
		google.maps.event.addDomListener(window, 'load', custom_map);
    </script>
    <script type="text/javascript">
    	$(function(){
		  $(".datespicker").datetimepicker({
		      format: 'd-M-Y',
		      autoclose: true,
		        todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
		  });
		});
		$(function(){
		  $(".timespicker").datetimepicker({
		  	  format: 'hh:ii',
		      minuteStep: 60,
				autoclose: 1,
				todayHighlight: 1,
				startView: 1,
				minView: 0,
				forceParse: 0
		  });
		});    	
    </script>
    <script>
    	$(document).ready(function(){

		    $(".filter-button").click(function(){
		        var value = $(this).attr('data-filter');
		        
		    if ($(".filter-button").removeClass("active")) {
				$(this).removeClass("active");
			}
			$(this).addClass("active");

		        if(value == "23")
		        {
		            //$('.filter').removeClass('hidden');
		            $(".filter").not('.d-22').hide('3000');
		            $('.filter').filter('.d-23').show('3000');
		        }
		        else
		        {
		//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
		//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
		            $(".filter").not('.'+value).hide('3000');
		            $('.filter').filter('.'+value).show('3000');
		            
		        }
		    });
		    
		});
    </script>

</body>
</html>
<?php 
	}  else {
			header('location: admin/login.php');
	} 
?>