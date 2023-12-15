<?php
global $dbHost, $dbUser, $dbPass, $dbName, $dbChar;
require './dbConn.php';
require './memberDAO.php';

$memDB = new memberDAO($dbHost, $dbUser, $dbPass, $dbName, $dbChar);

// $cond["username"] = "홍길동"; 
// $cond["email"] = "hong@ansan.ac.kr"; 

$rows = $memDB->getRowsByCondition("gimal");
$members["list"] = $rows;
echo json_encode($members);
?>