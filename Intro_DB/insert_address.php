<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css" />
    <title>Document</title>
</head>
<body>
    <?php
        include("includes/header.php");
?>
    <div class="flex-container">
    <form action="scripts/doInsert.php" method="get">
        <input type="input" name="houseNumName" value="" placeholder="House Number or Name" />
        <input type="input" name="addressOne" value="" placeholder="Address One (optional)" />
        <input type="input" name="addressTwo" value="" placeholder="Address Two (optional)" />
        <input type="input" name="addressThree" value="" placeholder="Address Three (optional)" />
        <input type="input" name="townCity" value="" placeholder="Town or City" />
        <input type="input" name="postCode" value="" placeholder="Post Code" />
        <input type="submit" name="submit" value="Insert Address" />
    </form>
    </div>

    </body>
</html>