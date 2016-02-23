<?php
require_once('../../includes/connection.inc.php');

if (isset($_GET['cmd'])) {
	$cmd = $_GET['cmd'];
} else {
	$cmd = 'index';
}

$conn = dbConnect('read');
$sql = "SELECT place, linkimage, description from weba1292_core.myimages where id='".$cmd."' order by myseq";
$result = $conn->query($sql) or die(mysqli_error($conn));
$row = $result->fetch_assoc();
$place = $row['place'];

mysqli_data_seek($result, 0);

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
<title><?php echo $place ?></title>
</head>

<body>

<h1 class="head1" align="center"><?php echo $place ?></h1>
<h2 align="center">Image links uploaded by Android Travel Book app that I created.</h2>
<table align="center">

<?php
while ($row = $result->fetch_assoc()) {

$mainImage = $row['linkimage'];
$descript = $row['description'];

?>

<tr>
<td width="350">
<br>
<h1><a href="<?php echo $mainImage; ?>" align="middle"><?php echo $descript; ?></a></h1>
</td>
</tr>

<?php
}
?>

</table>
</body>
</html>
