<!DOCTYPE html>
<html>
<head>
<h2>Page Navigation</h2>
	<button type="button" onclick="location.href = 'index.php'">Return to Home Screen</button>
	<button type="button" onclick="location.href = 'ViewStats.php'">View EPL Stats</button>
	<button type="button" onclick="location.href = 'query.php'">Statistics Search</button>
	<button type="button" onclick="location.href = 'Insert_Update.php'">Update / Edit the database</button
<style>
table, th, td {
    border: 1px solid black;
</style>
</head>
<body>

<?php

error_reporting(E_all ^ E_NOTICE);

include ('./myconnect.php');
$mysqli = get_mysqli_conn();
?>


<?php
$attribute = $_GET['attribute'];
$sign = $_GET['sign'];
$desiredvalue = $_GET['desiredvalue'];


$sql = "SELECT P.Fname, P.Lname, S.Club_Name, S.Position, S.Goals_Scored, S.Assists, S.Clean_Sheets, S.Appearances, S.Market_Value
FROM Player P, PlayerStats S
WHERE 
P.PlayerID = S.PlayerID
AND
$attribute $sign $desiredvalue";



$row = mysqli_query($mysqli,$sql);


if ($row->num_rows > 0){


echo '<h1>----------</h1>';
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Club Name</th><th>Position</th><th>Goals Scored</th><th>Assists</th><th>Clean Sheets</th><th>Appearances</th><th>Market Value</th></tr>";
    // output data of each row
    while($row2 = $row->fetch_assoc()) {
        echo  "<tr><td>" . $row2["Fname"]. "</td><td>" . $row2["Lname"]. "</td><td> ". $row2["Club_Name"]. "</td><td> " . $row2["Position"]. "</td><td> " . $row2["Goals_Scored"]. "</td><td> " . $row2["Assists"]. "</td><td> " . $row2["Clean_Sheets"]. "</td><td> " . $row2["Appearances"]. "</td><td> " . $row2["Market_Value"]. "</td> 
	<td><form action= 'index.php'  method= 'post'><input type='hidden' name='lid' value=$theID />
                                    <input type= 'submit' name= 'type' value= 'Add to Fantasy Team'/> </td></form>  </tr>";
}

}else{
echo '<h1>No Match Results</h1>';

}

$stmt->close();
$mysql->close();

?>


</form>





</body>
</html>
