<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root.'/includes/dbh.inc.php';
    /*
        $_SESSION['userCheckingBal'] = $row['chckAcc'];
        $_SESSION['userSavingsBal'] = $row['savAcc'];
        $_SESSION['userCreditsBal'] = $row['credits'];
        $_SESSION['userCheckingN'] = $row['chckNum'];
        $_SESSION['userSavingsN'] = $row['savNum'];
        $_SESSION['userCreditsN'] = $row['credNum'];*/
    require $root.'/head.php';
    require $root.'/navbar.php';
    require $root.'/includes/variables.php';
    require $root.'/includes/inactivity.php';
    if (isset($_SESSION['userId'])) {
        
    } else {
        header("Location: ../");
        exit();
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
    <body>
        <div id="innerHere"></div>
        <div class="signup-div">
        <form action="/includes/update.inc.php" method="post" class="signupform">
            <h1>Update Your Profile</h1>
            <input type="password" name="oldpassword" id="oldpassword" placeholder="old password">
            <input type="password" name="newpassword" id="newpassword" placeholder="new password">
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm password">
            <button type="submit" name="update-submit" id="log-in">Update</button>
        </form>
        </div>
        <?php
            require '../../footer.php';
        ?>
    </body>


</html>