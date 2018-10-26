<? ob_start(); header('Cache-Control: no-store, no-cache, must-revalidate');

$data = $_REQUEST['mapdata'];

mysqli_connect('localhost','root','');
$conn=mysqli_select_db('mapdir');

if($_REQUEST['command']=='save')
{

	$query = "update mapdir set value='$data'";
	if(mysqli_query($conn,$query))die('bien');
	die(mysqli_error());
}

if($_REQUEST['command']=='fetch')
{
	$query = "select value from mapdir";
	if(!($res = mysqli_query($conn,$query)))die(mysqli_error());		
	$rs = mysqli_fetch_array($res,1);
	die($rs['value']);		
}
?>