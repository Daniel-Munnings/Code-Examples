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
<?php
    include("scripts/connectDB.php");

    echo "<div class=\"flex-container\">";

    $sql = "SELECT personID, addressID, firstName, surname, status FROM person";
    $result = mysqli_query($conn, $sql);
    
    echo "<form action=\"index.php\" method=\"get\">";
        echo "<select name=\"Person\">";
        while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=\"".$row["personID"]."\">
            Firstname: ".$row["firstName"]." Surname: ".$row["surname"].
            "</option>";
        };
        echo "</select>";
        echo "<input type=\"submit\" value=\"Go\" name=\"Search\" />";
    echo "</form>";
    
    if(isset($_GET['Search']))
    {
        $personID = $_GET['Person'];
        $sql = "SELECT personID, address.addressID, houseNumName, addressOne, addressTwo, addressThree,	townCity, postCode,	address.status
                FROM person, address 
                WHERE personID = $personID 
                AND person.addressID = address.addressID";
        echo "<div>";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>".$row["houseNumName"]."</p>";
            echo "<p>".$row["addressOne"]."</p>";
            echo "<p>".$row["addressTwo"]."</p>";
            echo "<p>".$row["addressThree"]."</p>";
            echo "<p>".$row["townCity"]."</p>";
            echo "<p>".$row["postCode"]."</p>";
        };
        echo "</div>";
    };

    echo "</div>";

    // ----------------------------------------------------------------------------------------------------------------------------------

    echo "<div>";

    $sql = "SELECT addressID, houseNumName, postCode, status FROM address";
    $result = mysqli_query($conn, $sql);

    echo "<form action=\"index.php\" method=\"get\">";
        echo "<select name=\"AddressID\">";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value=\"".$row["addressID"]."\">
                Address: ".$row["houseNumName"].", ".$row["postCode"].
                "</option>";
        };
        echo "</select>";
        echo "<input type=\"submit\" value=\"Go\" name=\"AddressSearch\" />";
    echo "</form>";

    if(isset($_GET['AddressSearch']))
    {
        $addressID = $_GET['AddressID'];
        $sql = "SELECT personID, address.addressID, firstName, secondName, surname,	person.status
                FROM person, address
                WHERE address.addressID = $addressID 
                AND person.addressID = address.addressID";

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>".$row["firstName"].", ";
            echo "".$row["secondName"]." ,";
            echo "".$row["surname"]."</p>";
        };
    };

    echo "</div>";
?>
    <div>
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
    <div>
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
<!-- --------------------------------------------------------------------------- -->
    <div>
    <form action="index.php" method="get">
        <input type="input" name="firstName" value="" placeholder="First Name" />
        <input type="submit" value="Go" name="PersonNameSearch" />
    </form>

    <?php
        if(isset($_GET["PersonNameSearch"]))
        {
            $firstName = $_GET['firstName'];
            $prevPage = $_SERVER['HTTP_REFERER'];
    
            $sql = "SELECT firstName, secondName, surname 
                    FROM person
                    WHERE firstName LIKE '%$firstName%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<p>".$row["firstName"]."</p>";
                echo "<p>".$row["secondName"]."</p>";
                echo "<p>".$row["surname"]."</p>";
            };
        }
    ?>
    </div>
<!-- --------------------------------------------------------------------------- -->
    <div>
    <form action="index.php" method="get">
        <input type="input" name="surname" value="" placeholder="Surame" />
        <input type="submit" value="Go" name="PersonSurnameSearch" />
    </form>

    <?php
        if(isset($_GET["PersonSurnameSearch"]))
        {
            $surname = $_GET['surname'];
            $prevPage = $_SERVER['HTTP_REFERER'];
    
            $sql = "SELECT firstName, secondName, surname 
                    FROM person
                    WHERE surname LIKE '%$surname%'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                echo "<p>".$row["firstName"]."</p>";
                echo "<p>".$row["secondName"]."</p>";
                echo "<p>".$row["surname"]."</p>";
            };
        }
    ?>
    </div>
<!-- --------------------------------------------------------------------------- -->
    <div>
    <form action="index.php" method="get">
        <input type="input" name="surname" value="" placeholder="Surame" />
        <input type="submit" value="Go" name="PersonDetailSearch" />
    </form>
    
    <table>
        <tr>
            <th>First Name</th><th>Second Name</th><th>Surname</th><th>House Number or Name</th>
            <th>Address One</th><th>Address Two</th><th>Address Three</th><th>Town or City</th>
            <th>Post Code</th>
        </tr>
    <?php
        if(isset($_GET["PersonDetailSearch"]))
        {
            $surname = $_GET['surname'];
            $prevPage = $_SERVER['HTTP_REFERER'];
    
            $sql = "SELECT firstName, secondName, surname, houseNumName, addressOne, addressTwo, addressThree, townCity, postCode  
                    FROM person, address
                    WHERE surname LIKE '%$surname%'
                    AND address.addressId = person.addressID";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>".$row["firstName"]."</td><td>".$row["secondName"]."</td><td>".$row["surname"]."</td><td>".$row["houseNumName"]."</td>
                        <td>".$row["addressOne"]."</td><td>".$row["addressTwo"]."</td><td>".$row["addressThree"]."</td><td>".$row["townCity"]."</td>
                        <td>".$row["postCode"]."</td>
                    </tr>";
            };
        }
    ?>
    </table>
    </div>
    </body>
</html>