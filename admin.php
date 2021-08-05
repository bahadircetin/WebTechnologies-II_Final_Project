<?php
session_start();
if ($_SESSION["type"] == 1) {
    echo "<p>Welcome {$_SESSION["name"]} </p>";
} else {
    $error = 1;
    header("Location: index.php?error=$error");
}
include "db.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <link href="admincss/app.css" rel="stylesheet" type="text/css"/>
    <style>
        body{
            
            color: white;
            background-color: darkgray;
           
        }
         th:hover { color: rgb(220, 26, 40);}
         tr:hover { color: rgb(220, 26, 40);}
         #addd:hover{color: rgb(220, 26, 40);
         background-color: gold;
         font-weight: bold;}
    </style>
</head>
<body>
<div class="flixx" ><a href="https://fontmeme.com/fonts/bebas-neue-font/"><img src="https://fontmeme.com/permalink/190802/42c27abac0bc972c7806b1eadd03ff0e.png" alt="bebas-neue-font" border="0"></a></div>
<h1 style="color: rgb(220, 26, 40);">ADMIN PAGE</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Movie Name</th>
        <th>IMDB Rating</th>
        <th>Movie Cover Name</th>
    </tr>

    <?php
    $sql = "select * from movies order by mid";
    $rs = $db->query($sql);
    $total = $rs->rowCount();

    foreach ($rs as $row) {
        echo"<tr>";
        echo"<td>{$row["mid"]}</td>";
        echo"<td>{$row["mname"]}</td>";
        echo"<td>{$row["mrat"]}</td>";
        echo"<td>{$row["mimg"]}</td>";
        echo "<td><a href='adminDelete.php?movId={$row["mid"]}'><img src='images/del.png'></a></td>\n";
        echo"</tr>";
    }
    ?>
</table>
<p>total movie <?php echo $total; ?></p>
<div id="btnn">
    <a href="adminAddMov.php"><input type="button" id="addd" value="Add New Movie" name="movAddBtn"></input></a>
</div>
</body>
</html>
