<?php
session_start();

if ($_SESSION["type"] == 1) {
echo "<p>welcome {$_SESSION["name"]}</p>";
} else {
$error = 1;
header("Location: index.php?error=$error");
}

include "db.php";

extract($_POST);

$error = false;
if (isset($btnAdd)) {
    if(strlen($mid)>2)
{
        $error=true;
echo "id cannot contain more than 2 digits!";
}else{
try {
$sql = "insert into movies values(?,?,?,?)";
$stmt = $db->prepare($sql);
$res = $stmt->execute([$mid, $mname, $mrat, $mimg]);
} catch (Exception $ex) {
$error = true;
}
}
}
?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <link href="admincss/app.css" rel="stylesheet" type="text/css"/>
    <style>
        body{

            color: white;
            background-color: black;

        }
        th:hover { color: rgb(220, 26, 40);}
        tr:hover { color: rgb(220, 26, 40);}
    </style>
</head>
<body>
<div class="flixx" ><a href="https://fontmeme.com/fonts/bebas-neue-font/"><img src="https://fontmeme.com/permalink/190802/42c27abac0bc972c7806b1eadd03ff0e.png" alt="bebas-neue-font" border="0"></a></div>

<form method="POST" action="">
    <table>
        <tr>
            <td>ID :</td>
            <td><input type="text" name="mid"></td>
            </tr>
            <tr>
                <td>Name :</td>
                <td><input type="text" name="mname"></td>
                </tr>

                <tr>
                    <td>IMDB</td>
                    <td><input type="text" name="mrat"></td>
                    </tr>
                    <tr>
                        <td>Image Name</td>
                        <td><input type="text" name="mimg" ></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" name="btnAdd">ADD</button>
                            </td>
                        </tr>
                        </table>    
                        </form>
                        <?php
                        if (isset($btnAdd)) {

                        if (isset($error) && $error == false) {
                        echo "<p class='success'>Add operation is done</p>";
                        } else if (isset($error) && $error == true) { 
                        echo "<p class='error'>Add operation cannot be done</p>";
                        
                        }
                        }
                        ?>

                        <p><a href="admin.php">Back To Movie List</a></p>

                        </body>
                        </html>
