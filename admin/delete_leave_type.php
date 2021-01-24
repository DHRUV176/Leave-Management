<?php
include "../db.inc.php";
$id = $_GET["id"];
mysqli_query($con,"delete from leave_type where id=$id") or  die(mysqli_error($con));
?>

<script>
	window.location="leave_type.php";
</script>
