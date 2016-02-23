<?php
require_once('../../includes/connection.inc.php');

if (isset($_GET['cmd'])) {
	$cmd = $_GET['cmd'];
} else {
	$cmd = 'index';
}

$conn = dbConnect('read');
$sql = "SELECT paragraph1, paragraph2, filename, width, height, filename2, caption, descript, descript2, link1, link2, link3, link4, name1, name2, name3, name4 from weba1292_core.phpimages where county='".$cmd."'";
$result = $conn->query($sql) or die(mysqli_error($conn));
$row = $result->fetch_assoc();
$para1 = $row['paragraph1'];
$para2 = $row['paragraph2'];
$mainImage = $row['filename'];
$width = $row['width'];
$height = $row['height'];
$filename2 = $row['filename2'];
$caption = $row['caption'];
$descript = $row['descript'];
$descript2 = $row['descript2'];
$imagesize = getimagesize('../images/norway/'.$mainImage);
$link1 = $row['link1'];
$link2 = $row['link2'];
$link3 = $row['link3'];
$link4 = $row['link4'];
$name1 = $row['name1'];
$name2 = $row['name2'];
$name3 = $row['name3'];
$name4 = $row['name4'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Norway</title>
<meta name="description" content="Norway">
<link href="norstyle.css" rel="stylesheet">
<?php
if ($cmd == 'index') {
?>
<script language="JavaScript">
<!--

  if (document.images)
   {
     img1nor= new Image(100,25);
     img1nor.src="../images/norway/norway_gs.gif";  

     img1usa= new Image(100,25);
     img1usa.src="../images/norway/usa_gs.gif";
   }

function norway(imgName)
 {
   if (document.images)
    {
      norOn=eval(imgName + "nor.src");
      document[imgName].src= norOn;
    }
 }

function usa(imgName)
 {
   if (document.images)
    {
      usaOn=eval(imgName + "usa.src");
      document[imgName].src= usaOn;
    }
 }

//-->
</script>
<?php
} elseif ($cmd == 'fjord') {
?>
<script language="JavaScript">
<!--
function openPictureWindow_Fever(imageName,imageWidth,imageHeight,alt,posLeft,posTop) {
	newWindow = window.open("","newWindow","width="+imageWidth+",height="+imageHeight+",left="+posLeft+",top="+posTop);
	newWindow.document.open();
	newWindow.document.write('<html><title>'+alt+'</title><body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" onBlur="self.close()">'); 
	newWindow.document.write('<img src='+imageName+' width='+imageWidth+' height='+imageHeight+' alt='+alt+'>'); 
	newWindow.document.write('</body></html>');
	newWindow.document.close();
	newWindow.focus();
}
//-->
</script>
<?php
}
?>
</head>
<body>

<a href="#" onMouseOver="usa('img1')"
onMouseOut="norway('img1')">
<img src="../images/norway/norway_gs.gif" name="img1" border="0" align="left"></a> 

<div id="navTop">
<ul>
<!--#include virtual="time.shtml"-->
<?php
if (!empty($link1)) {

   $column = '<li><a href="norindex.php?cmd='.$link1.'">'.$name1.'</a></li>';
   echo $column;
}
if (!empty($link2)) {

   $column = '<li><a href="norindex.php?cmd='.$link2.'">'.$name2.'</a></li>';
   echo $column;
}
if (!empty($link3)) {

   $column = '<li><a href="norindex.php?cmd='.$link3.'">'.$name3.'</a></li>';
   echo $column;
}
if (!empty($link4)) {

   $column = '<li><a href="norindex.php?cmd='.$link4.'">'.$name4.'</a></li>';
   echo $column;
}
?>
</ul>
</div>

<h1 class="head1" align="center">Norway</h1>

<div id="navLeft">
<?php include('../../includes/navpage.inc.php'); ?>
</div>


<div id="middle">
<p class="para1" align="left">
<?php echo $para1; ?>
</p>
<p class="para2" align="left">
<?php echo $para2; ?>
</p>
</div>

<br>
<div id="rightImage">
<?php
   if ($cmd == 'fjord') {
     $image1 = '<a href="javascript:;" onClick="openPictureWindow_Fever(\'../images/norway/nj_j02_fjord.jpg\',\'550\',\'365\',\'Hardanger fjord\',\'20\',\'20\')">';     
     $image1 = $image1.'<img src="../images/norway/'.$mainImage.'" alt="'.$caption.'" height="160" width="200"" border="0"></a>';
   } else {
     $image1 = '<img src="../images/norway/'.$mainImage.'" alt="'.$caption.'" height="300" width="400">';
   }
   echo $image1;
?>
<br/>
<?php echo $descript ?>

<?php
if (!empty($filename2)) {
$image2 = '<br/><img src="../images/norway/'.$filename2.'" alt=" " height="300" width="400" >';
echo $image2; 
}
?>

<br/>
<?php echo $descript2 ?>
</div>

<br>
<br clear="left">
<!--
<a href="search.shtml">Search Site</a>
-->
</body>
</html>
