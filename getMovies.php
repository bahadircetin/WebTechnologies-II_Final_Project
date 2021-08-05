<?php
include "db.php";
$statement = $db->prepare("SELECT * FROM movies");
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if(count($results)>0){
    $json = json_encode($results);
    echo $json;
}
else {
    echo "There is no movie";
}
?>