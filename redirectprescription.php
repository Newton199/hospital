<?php require_once('check_login.php');?>
<?php include('connect.php');?>
<?php 

$sqldept = "SELECT * FROM prescription order by prescription_id desc limit 1";
$qsqldept = mysqli_query($conn,$sqldept);
$rsdept = mysqli_fetch_array($qsqldept);

$pid= $rsdept['prescription_id'];

header("Location: prescriptionrecord.php?prescription_id=".$pid);
?>