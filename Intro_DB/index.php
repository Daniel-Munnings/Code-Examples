<?php
    include("scripts/connectDB.php");

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

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>".$row["houseNumName"]."</p>";
            echo "<p>".$row["addressOne"]."</p>";
            echo "<p>".$row["addressTwo"]."</p>";
            echo "<p>".$row["addressThree"]."</p>";
            echo "<p>".$row["townCity"]."</p>";
            echo "<p>".$row["postCode"]."</p>";
        };
    };

    // ----------------------------------------------------------------------------------------------------------------------------------

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
?>

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

    <form action="scripts/doInsert.php" method="get">
        <input type="input" name="houseNumName" value="" placeholder="House Number or Name" />
        <input type="input" name="addressOne" value="" placeholder="Address One (optional)" />
        <input type="input" name="addressTwo" value="" placeholder="Address Two (optional)" />
        <input type="input" name="addressThree" value="" placeholder="Address Three (optional)" />
        <input type="input" name="townCity" value="" placeholder="Town or City" />
        <input type="input" name="postCode" value="" placeholder="Post Code" />
        <input type="submit" name="submit" value="Insert Address" />
    </form>