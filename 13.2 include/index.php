<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Include</title>
    <style>
        #menu{background-color:gray ; padding: 1rem;}
        #container{background-color: lightblue;}
        #footer{background-color: gray; padding: 1rem;}
    </style>
</head>

<body>
    <div class="" id="container">
        <?php
        include("./menu.php");
        ?>

        <h3>Contenido principal</h3>

        <?php
        include("./footer.php");
        ?>
    </div>

</body>

</html>