<?php
include "../db.inc.php";
$id = $_GET["id"];
mysqli_query($con,"delete from department where id=$id") or  die(mysqli_error($con));
?>

<script>
	window.location="department.php";
</script>
