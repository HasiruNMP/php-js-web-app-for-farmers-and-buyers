

<!DOCTYPE html>
<html>
  <head>
    <title>Marker Animations</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWH-XTux9pCrmqDoV6YM63Ex8FPrAQNLU&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 80%; width:70%;
        float:right;
        
      }

      #leftpanel{
        height:80%;width:30%;
        background-color: lightblue;
        float:left;
      }

      #reportphoto{
      	height:100px;width:100px;
      }
      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      table {
  width: 100%;
}


  
  
      
    </style>
    <script>
      // The following example creates a marker in Stockholm, Sweden using a DROP
      // animation. Clicking on the marker will toggle the animation between a BOUNCE
      // animation and no animation.
    function initMap() {


        var geocoder  = new google.maps.Geocoder();             // create a geocoder object
var location  = new google.maps.LatLng(7.297581160793088,80.63318501586913);    // turn coordinates into an object          
geocoder.geocode({'latLng': location}, function (results, status) {
if(status == google.maps.GeocoderStatus.OK) {           // if geocode success
var add=results[0].formatted_address;         // if address found, pass to processing function
document.write(add);

}

  

  

            
 




    </script>
  </head>
  <body>

    <div id ="leftpanel"> 

    
    	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dD4aW06XoB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn)
{
	 echo "Server Not connected";
}
else
{
	echo "Server connected";
}

if(!mysqli_select_db($conn,$dbname))
{
	echo "Database Not Selected";
}

else
{
	echo "Database Selected";
}


?>

<?php

$result = mysqli_query($conn,"SELECT * FROM reports");
?>





    	<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table border="1">
  
<?php

while($row = mysqli_fetch_array($result)) {
?>




<tr>
    <td><?php echo $row["report_id"]; ?> <br>
  		 <u><b id="submit"><?php echo $row["crop_name"]; ?> </b></u><br>
  		 <?php echo $row["crop_type"]; ?> <br>
  		 <?php echo $row["description"]; ?> <br>
   		 <?php echo $row["fname"]; ?>
    	<?php echo $row["lname"]; ?> <br>
    	<?php echo $row["email"]; ?><br>
    	<img id="reportphoto" src="images\<?php echo $row["photos"]; ?>">

    	<input id="lat"  type="hidden" value="<?php echo $row["lat"]; ?>" />
    	<input id="lng" type="hidden" value="<?php echo $row["longt"]; ?>" />
    	

    	

    	


    </td>
</tr>

<?php
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>

    </div>
    <div id="map"></div>
  </body>
</html>


