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

echo"<style>

form{
  font-size: 20px;
  text-align:center;
  background-color:#EBFDFA;
  width: 30%;
  height:45%;
  margin-left:35%;
  margin-top: 8%;
  border: 2px solid black;
  padding-top:50px;
}

select{
  font-size:20px;
}

input[type=button], input[type=submit], input[type=reset] {
  background-color: #010010;
  border: 2px solid white;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:23px;
}

</style>";

$sql = "SELECT fare1, seats, pnr FROM trains WHERE from1 = '$_POST[from]' AND to1 = '$_POST[to]'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($r = mysqli_fetch_assoc($result)) {
echo "<form action='result.php' method='post'>
<p>Cost per ticket : </p>
<input type = 'number' id='fare' name='fare' value='$r[fare1]' readonly required>
<p>Seats remaining : </p>
<input type = 'number' id='seats' name='seats' value='$r[seats]' readonly required><br><br>
<input type='hidden' id='number' name='number' value='$_POST[number]' readonly required>
<input type='hidden' id='pnr' name='pnr' value='$r[pnr]' readonly required>
<input type='submit' value='Confirm'>
</form>";
}
}

mysqli_close($conn);
?>
