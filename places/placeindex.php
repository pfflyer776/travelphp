<?php
require_once('../../includes/connection.inc.php');

$conn = dbConnect('read');

$sql = "SELECT id, place from weba1292_core.myplaces order by id";
$result = $conn->query($sql) or die(mysqli_error($conn));

?>
<!doctype html>
<html>

<head>
<style>
  div.nav a { padding: 5px; white-space:nowrap; }
</style>
<link href="http://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="placeindex.css?version=1">
<title>Travels</title>
</head>

<body>
<h1 align="center">Places</h1>
<h2 align="center">Place names uploaded by Android Travel Book app that I created.</h2>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="120">

<?php
while ($row = $result->fetch_assoc()) {

$id = $row['id'];
$place = $row['place'];

?>

<tr>
<td height="41">
<div class="nav">
<h1><a href="place.php?cmd=<?php echo $id ?>"><?php echo $place ?></a></h1>
</div>
</td>
</tr>

<?php
}
?>
</table>

</body>
</html>
