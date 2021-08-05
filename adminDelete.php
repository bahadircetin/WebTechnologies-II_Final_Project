<?php

session_start();

if ($_SESSION["type"] == 1) {
    echo "<p>welcome {$_SESSION["name"]}</p>";
} else {
    $error = 1;
    header("Location: index.php?error=$error");
}

include "db.php";

extract($_GET); // $stuid

if (isset($movId)) {
    $sql = "delete from movies where mid = ?";
    $stmt = $db->prepare($sql);
    $res = $stmt->execute([$movId]);
    if (!$res) {
        echo "error";
    } else {
        header("Location:admin.php");
        exit;
    }
} else {
    header("Location:error.php");
    exit;
}
?>

