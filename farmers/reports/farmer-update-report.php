<?php
session_start();
if ( isset( $_SESSION['femail'] ) ) 
{
  $email = $_SESSION['femail'];
}
else 
{
	//$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
	header("Location: ../index.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Update Report</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWH-XTux9pCrmqDoV6YM63Ex8FPrAQNLU&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%; width:90%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      // The following example creates a marker in Stockholm, Sweden using a DROP
      // animation. Clicking on the marker will toggle the animation between a BOUNCE
      // animation and no animation.
      let marker;

      function initMap() {
      	let myCenter = new google.maps.LatLng(7.297581160793088,80.63318501586913);
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 13,
          center: { lat: 7.2906, lng: 80.6337 },
        });
        marker = new google.maps.Marker({
          map,
          title: "Update Your Location",
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: { lat: 7.2906, lng: 80.6337 },
        });




      <?php
        $eml = $_POST["eml"];


      ?>

    
        
       // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
          content: "Update your location",
          position: myCenter,

        });

        infoWindow.open(map);
        // Configure the click listener.
        marker.addListener("click", (mapsMouseEvent) => {
          // Close the current InfoWindow.
          infoWindow.close();
          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
            
          });
          infoWindow.setContent(
           
              
            '<form action="farmer-updated-report.php" method="post" enctype="multipart/form-data"> <input type="hidden" id="eml" name="eml" value="<?php echo $eml; ?>"><table border="0"> <tr> <th colspan="2"><h1> Update Your Details</h1></th></tr><tr> <th> First Name: </th> <td> <input type="text" name="fname"> </td> </tr> <br> <tr> <th> Last Name: </th> <td> <input type="text" name="lname"> </td> </tr> <br> <tr> <th> Email: </th> <td> <input type="text" name="email"> </td> </tr> <br> <tr> <th> Crop Name: </th> <td> <input type="text" name="cropnme"> </td> </tr> <br> <tr> <th> Crop Type:</th> <td> <select name="cropt" ><option value="Fruits">Fruits</option><option value="Vegetables">Vegetable</option><option value="Grain">Grain</option></select></td> <br> <tr> <th> Quantity: </th> <td> <input type="text" name="qunt"> </td> </tr> <br> <tr> <th> Description: </th> <td> <input type="text" name="desc"> </td> </tr> <br> <tr> <th> Latitude: </th> <td> <input type="hidden" name="lati"  value="'+ mapsMouseEvent.latLng.lat() +'" > <input type="text"  disabled value="'+ mapsMouseEvent.latLng.lat() +'" > </td> </tr> <br><br> <tr> <th> Longitude: </th> <td> <input type="hidden" name="longi"  value="'+ mapsMouseEvent.latLng.lng() + '" > <input type="text"  disabled value="'+ mapsMouseEvent.latLng.lng() + '" > </td> </tr> <br>  <tr> <th> <label for="myfile">Select Photo1:</label> </th>  <br> <th> <input type="file" name="image"> </tr> </th>  <br>    <tr> <th> <label for="myfile">Select Photo 2:</label> </th>  <br> <th> <input type="file" name="image2"> </tr></th><br>  <tr> <th> <label for="myfile">Select Photo3:</label> </th>  <br> <th> <input type="file" name="image3"></tr></th><br><tr><td colspan="2"><input type="submit" name="submit" value="Update"> </td> </tr></form> '
          );
          infoWindow.open(map);
        });
      }

// JSON.stringify(mapsMouseEvent.latLng.toJSON())

    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>
