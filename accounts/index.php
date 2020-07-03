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
        <div class="overlay"></div>
        <div class="user-info">
            <div class="userdis">
            <h3>Accounts</h3>
            <table style="width:100%">
                <tr class="checker">
                    <th>Type</th>
                    <th>Account Number</th>
                    <th>Available Balance</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Personal Checking</td>
                    <td>
                    <?php
                        echo '****'.$userCheckingN;
                    ?>
                    </td>
                    <td>
                    <?php
                        echo '$'.number_format($userCheckingBal, 2, '.', ',');
                    ?>
                    </td>
                    <td><a href="/transfer/index.php?transferfrom=check">Transfer</a></td>
                </tr>
                <tr class="checker">
                    <td>Gull Credits</td>
                    <td>
                    <?php
                        echo '****'.$userCreditsN;
                    ?>
                    </td>
                    <td>
                    <?php
                        echo '$'.number_format($userCreditsBal, 2, '.', ',');
                    ?>
                    </td>
                    <td><a href="/transfer/index.php?transferfrom=cred">Transfer</a></td>
                </tr>
                <tr>
                    <td>Savings Account</td>
                    <td>
                    <?php
                        echo '****'.$userSavingsN;
                    ?>
                    </td>
                    <td>
                    <?php
                        echo '$'.number_format($userSavingsBal, 2, '.', ',');
                    ?>
                    </td>
                    <td><a href="/transfer/index.php?transferfrom=sav">Transfer</a></td>
                </tr>
            </table>
            <h3>Recent Activities</h3>
            <table style="width:100%">
                <tr class="checker">
                    <th>Account</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>
                    <?php
                        echo '****'.$userCheckingN;
                    ?>
                    </td>
                    <td>06/28</td>
                    <td>Black*Market</td>
                    <td class="positive"><p>+$10,000.00</p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        echo '****'.$userCheckingN;
                    ?>
                    </td>
                    <td>06/26</td>
                    <td>Spotify</td>
                    <td class="negative"><p>-$9.99</p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        echo '****'.$userCheckingN;
                    ?>
                    </td>
                    <td>06/20</td>
                    <td>PH*Premium</td>
                    <td class="negative"><p>-$7.99</p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        echo '****'.$userSavingsN;
                    ?>
                    </td>
                    <td>06/19</td>
                    <td>MS*Refund</td>
                    <td class="negative"><p>-$2,100.00</p></td>
                </tr>
            </table>
            <p class="load">Load More</p>
                </div>
        </div>
        <script>document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
  if(event.keyCode == 123) {
    console.log('You cannot inspect Element');
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
}
        </script>
        <footer class="footer">
            <div class="footer-content">
                <p>© Gull le Belle 
                    <?php
                        echo date('Y');
                    ?> Coo!</p>
            </div>
        </footer>
    </body>


</html>