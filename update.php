<?php 


require_once 'functions.php';
require_once 'conect.php';

$table = $_POST['action'];
print_r(update($_POST ));
header("location: $table.php");

?>