<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database

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

$sql = "CREATE DATABASE IF NOT EXISTS train";
if (mysqli_query($conn, $sql)) {
  echo "<form action='confirm.php' method='post'>
  <label for='from'>FROM : </label>
<select id='from' name='from'>
  <option value='Mumbai'>Mumbai</option>
  <option value='Delhi'>Delhi</option>
  <option value='Chennai'>Chennai</option>
</select><br><br>
<label for='to'>TO : </label>
<select id='to' name='to'>
<option value='Delhi'>Delhi</option>
<option value='Mumbai'>Mumbai</option>
<option value='Chennai'>Chennai</option>
</select>
<p>DATE : </p>
<input type='date' id='date' name='date' required>
<p>NUMBER OF PASSENGERS : </p>
<input type='number' id='number' name='number' required><br><br>
<input type='submit' value='submit' style='font-size: 20px;'>
  </form>";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}


mysqli_close($conn);
?>
