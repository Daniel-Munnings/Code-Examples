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
    

    include("scripts/connectDB.php");
?>
    <div class="flex-container">

    <form action="scripts/doInsert.php" method="get">
        <?php
            $sql = "SELECT addressID, houseNumName, postCode, status 
                    FROM address";
            $result = mysqli_query($conn, $sql);
        ?>
        <input type="input" name="firstName" value="" placeholder="First Name" />
        <input type="input" name="secondName" value="" placeholder="Second Name (optional)" />
        <input type="input" name="surname" value="" placeholder="Surname" />
        <select name="address">
            <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"".$row["addressID"]."\">
                        Address: ".$row["houseNumName"].", ".$row["postCode"].
                        "</option>";
                };
            ?>
        </select>
        <input type="submit" name="submit" value="Insert Person" />
    </form>
    </div>

    </body>
</html>