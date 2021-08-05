<?php
session_start();
require_once 'db.php';


if (isset($_GET["error"])) {
    echo "<p>you dont have permission to visit that website</p>";
}

if (isset($_POST["btnLogin"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $stmt = $db->prepare("SELECT * FROM login2 WHERE uname = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($row);

    if ($row) {
        if ($email == $row["uname"]) {
            if ($pass == $row["password"]) {
                if ($row["type"] == 1) {
                    $_SESSION["name"] = $row["uname"];
                    $_SESSION["type"] = $row["type"];
                    header("Location: admin.php");
                } else {
                    $_SESSION["name"] = $row["uname"];
                    $_SESSION["type"] = $row["type"];
                    header("Location: user.php");
                }
            }
        }
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <style>
        body{
            font-family: babas-neue;
            background-color: gray;
        }
        .bigContainer{
            height: 500px;
            color:gray;
            margin: 100px auto;
            border-radius: 20px;
            text-align: center;
            width: 350px;
            background-color: black;

        }
    </style>
</head>
<body>
    <form class="bigContainer" method="post" action="">
        <div class="flixx" ><a href="https://fontmeme.com/fonts/bebas-neue-font/"><img src="https://fontmeme.com/permalink/190802/42c27abac0bc972c7806b1eadd03ff0e.png" alt="bebas-neue-font" border="0"></a></div>

        <div class="mailCont" data-validate = "Email is required">
            <span class="label">Username: </span>
            <input class="mail" type="text" name="email" placeholder="Type your username">

        </div>
        <br>

        <div class="passCont" data-validate="Password is required">
            <span class="labelpasswd">Password:  </span>
            <input class="passwd" type="password" name="pass" placeholder="Type your password">

        </div>

<br>

        <div class="loginCont">
            <div class="wrapLogin">

                <button class="loginBtn" type="submit" name="btnLogin">
                    Login
                </button>
            </div>
        </div>


    </form>
</body>
</html>
