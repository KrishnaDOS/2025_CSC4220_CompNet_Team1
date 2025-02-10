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
                <li><a href="agroblog.html">AgroBlog</a></li>
                <li><a href="faqs.html">FAQs</a></li>
                <li><a href="support.php">Support</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li id="timestamp"><script>showTime();</script></li>
            </ul>
        </nav>
        <!--Page Content-->
        <main style="text-align: justify;">
            <!--Skip To Content Fragment Identifier-->
            <a class="skipToContent" href="#skipToContent">&darr; Skip to Content &darr;</a>
            <!--Go to Previous Page-->
            <button id="goBack" style="display: inline;" onclick="goBack()">Return to Previous Page</button>
            <!--Skip To Content-->
            <div id="skipToContent"></div>
            <h1>Checklist</h1><br><br>
            <dl>
                <dt>Homepage</dt>
                <dd>
                    The homepage (or initial page) is <a href="index.html">index.html</a>. You can also access this page by clicking on <a href="http://18.220.194.148/finalproject/">http://18.220.194.148/finalproject/</a>.
                </dd><br><br>
                <dt>About Us Page</dt>
                <dd>
                    The "about us" page is <a href="aboutus.php">aboutus.php</a>, which describes (to some level of detail) the motivation behind the creation of this website. All the different technological components have been listed, and I have talked about myself and what I learned from the Web Programming class.
                </dd><br><br>
                <dt>Site Description Page</dt>
                <dd>
                    The site description page (<a href="sitedesc.html">sitedesc.php</a>) explains the problem formulation, target audience, and provides a "quick start" guide on what users of this website should do.
                </dd><br><br>
                <dt>Checklist Page</dt>
                <dd>
                    The checklist page is what you are viewing right now, <a href="checklist.php">checklist.php</a>. This page contains a list of all project requirements which have been implemented in this website.
                </dd><br><br>
                <dt>General User</dt>
                <dd>
                    A user has been created for the purpose of demonstrating the login functionality and membership area within this website. The credentials for this "Demo User" can be found in Team Mindshift LMS under "Section 11-14: Final Project". Use these credentials in order to log in to the website through <a href="login.php">login.php</a>, after which you will be able to access <a href="support.php">support.php</a>
                </dd><br><br>
                <dt>Membership Area</dt>
                <dd>
                    As explained before, a part of this site, i.e., <a href="support.php">support.php</a>, can only be accessed upon login through <a href="login.php">login.php</a>. This is the membership area, and without valid credentials, you cannot log in to the Support page.
                </dd><br><br>
                <dt>JavaScript Usage</dt>
                <dd>
                    JavaScript has been used extensively throughout the website. A button can be found towards the top of every webpage here, "Return to Previous Page", which uses minimal JavaScript to quickly return to the previous page. jQuery is also utilized for AJAX for date/time functionality on all webpages.
                </dd><br><br>
                <dt>New Library / Site Integration Usage</dt>
                <dd>
                    <a href="index.html">index.html</a> contains a product promotional video uploaded to YouTube and loaded onto the homepage via a site integration utilizing the "iframe" HTML tag. The YouTube video is rendered, and it is possible to go from this website to YouTube via the site integration.
                </dd><br><br>
                <dt>Theme</dt>
                <dd>
                    A common CSS stylesheet has been used throughout the website by all pages, resulting in a responsive design that is user-friendly and page-consistent. You may see the stylesheet code here: <a href="akagro.css">akagro.css</a>
                </dd><br><br>
                <dt>AJAX Usage</dt>
                <dd>
                    The AJAX programming technique has been utilized for displaying current date and time for all webpages here. Check out the left navigation area on all the webpages, and <a href="timestampAjax.php">timestampAjax.php</a> for more information. Notice how the date/time continually updates without refreshing the actual webpage.
                </dd><br><br>
                <dt>Database Usage</dt>
                <dd>
                    A MySQL database has been used for storing product information as well as valid user credentials. phpMyAdmin allows the administrator to manage the database. The relevant pages to check out are <a href="login.php">login.php</a> as well as <a href="products.php">products.php</a>.
                </dd><br><br>
            </dl>
            <p>That summarizes all the feature components as well as page components which constitute the project requirements for this website.</p>
        </main>
        <!--Copyright & Secondary Navigation-->
        <footer>
            <div class="desktop">&nbsp; <br></div>
			<a href="sitedesc.php">Site Description</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
			<a href="checklist.php">Checklist</a> &nbsp;&nbsp;&nbsp;&nbsp;<br class="mobile">
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