<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "train";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "<style>

p{
  font-size: 25px;
  text-align:center;
  background-color:#EBFDFA;
  width: 30%;
  height:35%;
  margin-left:35%;
  margin-top: 8%;
  border: 2px solid black;
  padding-top:50px;
}

</style>";

$fare=$_POST['fare'] * $_POST['number'];
echo "<p>PNR : $_POST[pnr] <BR> FARE : &#x20B9;$fare";

echo "<br> Seat numbers : ";
for ($i=$_POST['seats'];$i>$_POST['seats']-$_POST['number'];$i=$i-1){
  echo "$i  ";
}

$sql="UPDATE trains SET seats=$i WHERE pnr='$_POST[pnr]'";
if (mysqli_query($conn, $sql)) {
  echo "<BR><br>Congrats! Your seats have been booked. <br>";
  echo "<a href='index.php'> Click here to contiue </a>";
}
echo "</p>";
mysqli_close($conn);
?>
