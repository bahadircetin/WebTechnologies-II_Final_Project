<?php
session_start();
include "db.php";
extract($_POST);

$stmt = $db->prepare("SELECT mid,mname,mrat FROM movies where mid= ?");
$stmt->execute([$mov]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["movies"][$mov]=$results[0];

echo "{$results[0]["mname"]} added to list";

?>

