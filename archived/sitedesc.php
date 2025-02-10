<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="We are the Spring 2025 Computer Networks 
        Team 1! Come visit us at https://www.compnet2025.com/">
    <link rel="stylesheet" href="akagro.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>Computer Networks Team 1 Spring 2025</title>
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
            <a href="index.html">
                <div id="companyLogo"></div>
            </a>
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
        <main style="text-align: justify;">
            <br><br>
            <dl>
                <dt style="text-align: left">Target Audience - Describe who are the users of your site</dt>
                <dd>
                    Users of this site are farmers, agriculturalists, and others supporting the process of farming, such as factories or other areas of food production who wish to purchase agricultural equipment.
                </dd><br><br>
                <dt style="text-align: left">Purpose - What is it that you want your users to get out of using the site</dt>
                <dd>
                    The purpose of this site is to sell agricultural equipment to our customers so that they can improve not only the quantity, but also the quality, of the food they produce as farmers or agriculturalists.
                </dd><br><br>
                <dt style="text-align: left">Problem Formulation/Statement - What problem are you trying to solve for the users of the site</dt>
                <dd>
                    This goes hand-in-hand with the purpose of this website and company. I see a lack of websites which can market and sell needed farming equipment to agriculturalists who need this kind of equipment. Second, the equipment currently being used is not necessarily the most eco-friendly, and I see a shift in farming practices coming very soon - and if not, we need to begin implementing new eco-friendly processes. This website aims to be a major player in the farming/food industry and bring a paradigm shift in practices which will make our food production much more sustainable and healthier.
                </dd><br><br>
                <dt style="text-align: left">"Quick Start Guide" - What are the actions that you want the users to take once they have used your site</dt>
                <dd>
                    Hopefully, this website interests you and serves your immediately farming needs. After checking the <a href="products.php">product page</a> (more to come soon), you may send out a <a href="support.php">support form</a> to receive a quote for purchasing any machinery. If you do not find the products you need/want, send us a <a href="survey.html">survey form</a> so that we can begin adding those products to our website.
                </dd><br><br>
            </dl><br><br>
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