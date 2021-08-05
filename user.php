<?php
session_start();

if ($_SESSION["type"] == 0) {
    echo "<p>welcome {$_SESSION["name"]}</p>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
    <title></title>
    <script src="jquery.min.js" type="text/javascript"></script>
    <link href='https://fonts.googleapis.com/css?family=Russo One' rel='stylesheet'>
        <style>
            body{
                background-color: black;
                color:white;
            }
            #moviess td:hover{
                border:2px solid rgb(220, 26, 40);
            }
            #moviess td{
                font-family: 'Russo One';font-size: 15px;
                text-align: center;
                color:white;
                border:2px solid gray;
                width: 200px;
                height: 150px;
            }
            .btn:hover{
                border:2px solid lightsalmon;
            }
            .btn{
                position: relative;
                margin:0 auto;
                padding: 10px;
                text-align: center;
                height: 20px;
                width: 250px;
                border-radius: 30px;
                background-color: rgb(220, 26, 40);
                color: lightsalmon;
            }
            #movInfo{
                position: relative;
                margin: 0 auto;
                border-radius: 20px;
                font-family: 'Russo One';font-size: 22px;
                text-align: center;
                background-color: darkblue;
                color: bisque;
                width: 450px;
                height: 300px;
            }
            #movList td:hover{
                color:gold;
                border:1px solid lime;
            }
            #movList td{
                color:#5ef5ac;
                border:1px solid rgb(220, 26, 40);
            }
            #movList{
                margin-top: -250px;
                float: right;
            }
        </style>
        <script>
            $(function () {
                $.get("getMovies.php", function (result) {
                    data = $.parseJSON(result);
                    for (i in data) {
                        var eachrow = "<td onclick='displayMovieDetail(" + data[i].mid + ")'><img src='./images/" + data[i].mimg + ".jpg'>" + data[i].mname + "</td>";
                        $('tr').append(eachrow);
                    }
                });
                $("#movInfo").hide();
            });
            function displayMovieDetail(movId) {
                $("#movInfo").fadeIn(1500);
                $.getJSON("getMoviesById.php", {mov: movId}, function (result) {                    
                    if (result.length > 0) {
                        $("#movId").html(result[0].mid);
                        $("#movName").html(result[0].mname);
                        $("#mrat").html(result[0].mrat);
                        $("#btnAdd").unbind("click");
                        $("#btnAdd").click(function () {
                            $.post("addToList.php", {mov: movId}, function (result) {
                                $("#msg").html(result);
                            });
                        });
                        $("#btnList").unbind("click");
                        $("#btnList").click(function () {
                            $.post("getMoviesAddedToList.php", function (result) {
                                $("#movList").html(result);

                            });
                        });
                    };
                });
            };
            function deleteFromList(movId) {
                $.post("deleteMovieFromList.php", {mov: movId}, function (result) {
                    $("#movList").html(result);
                });
            }
        </script>
    </head>

    <body>
    <div class="flixx" ><a href="https://fontmeme.com/fonts/bebas-neue-font/"><img src="https://fontmeme.com/permalink/190802/42c27abac0bc972c7806b1eadd03ff0e.png" alt="bebas-neue-font" border="0"></a></div>
    
    <table id="moviess">
        <tr>
        </tr>
    </table>
    <div id="movInfo">
        <br><div><label>Movie Name:</label>  <span id="movName"></span></div>             
        <div><label>IMDB Rating:</label>  <span id="mrat"></span></div>
        <br><br>
        <div class="btn" id="btnAdd">Add To Watch List</div>
        <br>
        <div class="btn" id="btnList">Display Watch List</div>
        <br><div id="msg"></div>
    </div> 

    <div id="movList"></div>
</body>
</html>
