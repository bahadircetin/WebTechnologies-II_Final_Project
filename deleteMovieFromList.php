<?php
session_start();

extract($_POST);
unset($_SESSION["movies"][$mov]);
echo "<table>";
echo "<tr><th colspan='4' style='color:rgb(220, 26, 40)'>WATCH LIST</th><tr>";
echo "<tr><th>ID</th><th>Name</th><th>IMDB Rating</th><th></th></tr>";
foreach ($_SESSION["movies"] as $mov){
    echo "<tr>";
    foreach ($mov as $key=>$movdetail){
        echo "<td>$movdetail</td>";  
    
    }
    echo "<td onClick='deleteFromList({$mov["mid"]})'>Delete From List</td>";
    echo "</tr>";
}
echo "</table>";

?>

