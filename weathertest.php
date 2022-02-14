<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        weather data monitoring system
    </title>
</head>
<body>
    <form method="POST" action="weathertest.php">
        <input type="text" name="cityName" placeholder="Enter City Name">
        <button type="submit" name="submit">Get Data</button>
    </form>
</body>
</html>

<?php
//phpinfo(); 
// this is ues to check whether curl is supported by PHP version or not
 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['cityName']))
 {
     $city = $_POST["cityName"];  
    $url = "http://api.openweathermap.org/data/2.5/weather?q=".$city."&units=metric&appid=492ac9c5809a30780347397e338e8d00";
$ch = curl_init();
// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
//grab URL and pass it to the variable.
curl_setopt($ch, CURLOPT_URL, $url);
  
$result = curl_exec($ch);
  
//echo $result; 
curl_close($ch);
$data = json_decode($result);
echo    "The temperature in ".$city." is: ";
echo $data->main->temp."°C";
echo "<br>"."<br>";
//get the icon image id from json and store in $imgid
$imgid = $data->weather[0]->icon;
//echo "<br>".$imgid;
// now show the image 
//echo '<img src="http://openweathermap.org/img/w/' . $imgid . '.png"
                    //class="weather-icon" />';
}
?>