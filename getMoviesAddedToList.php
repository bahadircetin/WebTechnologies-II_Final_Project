<?php

session_start();

if (isset($_SESSION["movies"])) {
    echo "<table>";
    echo "<tr style='color:rgb(220, 26, 40)'><th colspan='4'>WATCH LIST</th><tr>";
    echo "<tr><th>ID</th><th>Name</th><th>IMDB Rating</th><th></th></tr>";
    foreach ($_SESSION["movies"] as $mov) {
        echo "<tr>";
        foreach ($mov as $key => $movdetail) {
            echo "<td class='detailed'>$movdetail</td>";
        }
        echo "<td onClick='deleteFromList({$mov["mid"]})'>Delete From List</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "List empty";
}
?>
