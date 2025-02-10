<?php

    define('DB_NAME', 'akagro');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'StudyWell!09');
    define('DB_HOST', 'localhost');

    function connectToDatabase() {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    // Connect to the database
    $connection = connectToDatabase();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="We are the Spring 2025 Computer Networks 
        Team 1! Come visit us at https://www.compnet2025.com/">
        <link rel="stylesheet" href="akagro.css">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <title>Our Products - Computer Networks Team 1 Spring 2025</>
        <script>
        // JavaScript to go back
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="./jquery/jquery-3.7.1.min.js"></script>
    <script>
        const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay))

        const repeatedGreetings = async () => {
            await sleep(1000)
            //console.log("First")
            //await sleep(1000)
            //console.log("Second")
            //await sleep(1000)
            //console.log("Third")
        };

        //repeatedGreetings();

        const showTime = async() => {
            while (true) {
                //console.log("Value of i: " + i);
                $.get("./timestampAjax.php", { "cmd": "time" }, function (data) {
                    $("#timestamp").html(data);
                });
                await sleep(1000);
            }
            return (false);
        }
    </script>
    </head>
    <body>
        <div id="wrapper">
            <!--Back To Top-->
            <div id="backToTop"></div>
            <!--Company Logo-->
            <header>
                <a href="index.html"><div id="companyLogo"></div></a>
            </header>
            <!--Primary Navigation-->
            <nav>
                <ul>
                    <li id="home"><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="faqs.html">FAQs</a></li>
                <li><a href="support.php">Support</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li id="timestamp"><script>showTime();</script></li>
                </ul>  
            </nav>
            <!--Page Content-->
            <main>
                <!--Skip To Content Fragment Identifier-->
                <a class="skipToContent" href="#skipToContent">&darr; Skip to Content &darr;</a>
                <!--Go to Previous Page-->
                <button id="goBack" style="display: inline;" onclick="goBack()">Return to Previous Page</button>
                <!--Skip To Content-->
                <div id="skipToContent"></div>
                <h1>Our Products</h1>
                <hr>
                <?php
                    // Get list of products 
                    // SQL statement
                    $SQL = "SELECT ID, NAME, DESCRIPTION, PRICE, PICTURE FROM PRODUCT ORDER BY ID";

                    // Get the requested data from the database table
                    $table = mysqli_query($connection, $SQL);

                    // If the user has been found, then the row count should be one
                    if (mysqli_num_rows($table) > 0) {

                        while ($row = mysqli_fetch_assoc($table)) {
                            $id = $row['ID'];
                            $productname = $row['NAME'];
                            $description = $row['DESCRIPTION'];
                            $price = $row['PRICE'];
                            $picture = $row['PICTURE'];
                ?>

                <h3><?php echo $id; print(". "); echo $productname ?></h3>
                <div>
                    <br><br>
                    <picture>
                        <source media="(min-width: 1024px)" srcset="images/thumbnails/<?php echo $picture ?>">
                        <a href="images/<?php echo $picture ?>" target="_blank">
                            <img src="images/<?php echo $picture ?>" width="300">
                        </a>
                    </picture>
                </div>
                <div>
                <?php echo $description ?>
                    <p style="font-weight: bold;">Price: <?php echo $price ?> USD</p>
                    <!--Add To Cart-->
                    <a class="addToCart" href="support.php">Contact Support for a Quote!</a>
                </div><br><br>
                <?php
                        } // end while
                    } // end if
                ?>

                <hr> <br><br>

                <!--Back To Top Fragment Identifier-->
                <a class="backToTop" href="#backToTop">&uarr; Back to Top &uarr;</a>
            </main>
            <!--Copyright & Secondary Navigation-->
            <footer>
            <div class="desktop">&nbsp; <br></div>
			<a href="sitedesc.php">Site Description</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <a href="policy.html">Privacy Policy</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <a href="sitemap.html">Site Map</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <a href="survey.html">RateUs Survey</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
            <div></div>
            <div class="mobile">Call <a href="tel:800-000-0000">1-800-COMP-NET</a></div><br class="desktop"><br
                class="mobile">
            <div id="copyright">Copyright &copy; 2025 Computer Networks Team 1, Inc.&nbsp;All rights reserved.</div>
            <div id="desktop">&nbsp; <br></div>
        </footer>
        </div>
    </body>
</html>