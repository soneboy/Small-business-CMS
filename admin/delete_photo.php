<?php require_once('../initialize.php');?>

<?php
$delete_photo=new Photos();
$delete_photo->id=isset($_GET['id'])?$_GET['id']:null;
$delete_photo->name=isset($_GET['name'])?$_GET['name']:null;

$delete_photo->delete_photo();
$delete_photo->delete_file();
header('Location: panel.php?id=homepage&page_id=1');










?>