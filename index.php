
    <?php
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        include('head.php');
        require $root.'/includes/inactivity.php';
    ?>
    <body>
        <?php 
        if (isset($_GET['timeout'])) {
            if (!isset($_SESSION['userId'])) {
                
            }
        }
    
    if (isset($_SESSION['userId'])) {
        echo '
        <script>
        var functionName = quizTimer();
        setInterval(function () {
            quizTimer();
        }, 1000);
        
        </script>';
    }
        
        ?>
        <video autoplay muted loop id="myVideo">
            <source src="/assets/mp4/production%20ID_3771136.mp4" type="video/mp4">
        </video>
        <?php
            include('login.php');
        ?>
        <?php
            include('navbar.php');
        ?>
        <div class="welcome">
            <h1>Welcome<?php
                if (isset($_SESSION['userId'])) {
                    echo ' back ';
                } else {
                    echo ' ';
                }
                ?>to Gull <span class="le">le</span> Belle Banking<?php
                if (isset($_SESSION['userId'])) {
                    echo ', '.$_SESSION['userUid'];
                } else {
                    echo ' ';
                }
                
                ?></h1>
            <?php
                $slogan = rand(1, 101);
                if ($slogan <= 10) {
                    echo "<p>Money problems? Where we're going we won't have money problems.</p>";
                } else if ($slogan <= 20) {
                    echo "<p>THIS IS AMERICA!!!</p>";
                } else if ($slogan <= 30) {
                    echo "<p>That's not true! That's impossible!</p>";
                } else if ($slogan <= 40) {
                    echo "<p>Also try Minecraft!</p>";
                } else if ($slogan <= 50) {
                    echo "<p>Legitimate companies do not use gift cards as a payment method.</p>";
                } else if ($slogan <= 60) {
                    echo "<p>Just wait a moment sir!</p>";
                } else if ($slogan <= 70) {
                    echo "<p>Gull le Belle will help with each and everything!</p>";
                } else if ($slogan <= 80) {
                    echo "<p>What do you think I'm fool here bro?</p>";
                } else if ($slogan <= 90) {
                    echo "<p>Sir!!</p>";
                } else if ($slogan <= 91) {
                    echo "<p>Don't log in!!! He or she is scamming you!!!</p>";
                } else if ($slogan <= 101) {
                    echo "<p>Did you connect on teamviewer, supportme, or something else?</p>";
                }
            ?>
        </div>
        <div id="innerHere"></div>
        <div class="page">
        <div class="about section">
            <div class="about-content content">
                <h1>The unanimous Declaration of the thirteen united States of America</h1>
                <p>When in the Course of human events, it becomes necessary for one people to dissolve the political bands which have connected them with another, and to assume among the powers of the earth, the separate and equal station to which the Laws of Nature and of Nature's God entitle them, a decent respect to the opinions of mankind requires that they should declare the causes which impel them to the separation.</p>
            </div>
        </div>
        <div class="account-options section" id="accounts">
            <div class="account-content content">
                <h1>We Offer Competitive Rates & Low Prices</h1>
                <div class="prices"><h2>15 Year Fixed Rate</h2><h3>6.9%</h3><p>Interesting Rate</p></div>
                <div class="prices"><h2>30 Year Fixed Rate</h2><h3>66.6%</h3><p>Interesting Rate</p></div>
                <div class="prices"><h2>Flock Rate</h2><h3>9%</h3><p>Very Interesting</p></div>
            </div>
        </div>
        <div class="other-info section" id="fraud">
            <div class="other-content content">
                <h1>Don't accept refunds from unknown numbers</h1>
                <p>Due to recent increase of scams, Gull le Belle has restricted transfer amount to $5000 per transfer. Please do not accept refunds from random callers, they are scammers. Gull le Belle will protect our customers ensuring each and everyone are kept away from scams. Microsoft will never ask you to log in to your bank or ask to buy gift cards.</p>
            </div>
        </div>
        <div class="affiliated-banks section" id="banks">
            <div class="affiliated-content content">
                <h1>Some of Our Affilliated Banks</h1>
                <div class="banks"><h2>X Æ A-12</h2><img src="/assets/png/XEALogo.png" height="100px"></div>
                <div class="banks"><h2>Scotiabutt</h2><img src="/assets/png/ScotiabuttLogo.png" height="100px"></div>
                <div class="banks"><h2>Flockbank</h2><img src="/assets/png/FlockLogo.png" height="100px"></div>
                <div class="banks"><h2>Tetris Depot</h2><img src="/assets/png/TDLogo.png" height="100px"></div>
            </div>
        </div>
        </div>
        <?php
            require 'footer.php';
        ?>
    </body>
</html>