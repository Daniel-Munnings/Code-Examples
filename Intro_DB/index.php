<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Address Book</title>
</head>
<body>

    <?php
        include("includes/header.php");
    ?>

    <div class="mainContent">
        <?php
            include("scripts/connectDB.php");
            $sql = "SELECT firstName, middleName, surname 
                    FROM person";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
            <section class="card">
                <div class="profilePic">

                </div>
                <div class="profileText">
                    <?php
                    echo "<h1>".$row["firstName"]." ".$row["middleName"]." ".$row["surname"]."</h1>";
                    ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam porro nemo ipsum similique asperiores, dolores eius quis! Suscipit et ratione eligendi ab, quidem laudantium officiis delectus asperiores aliquid debitis quaerat?</p>
                </div>
                <div class="profileLinks">
                    <p>Edit</p>
                </div>
            </section>
            <?php
            };
            ?>
    </div>

    <?php
        include("includes/footer.php");
    ?>
    
</body>
</html>