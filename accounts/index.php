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
    $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
    $arr = json_decode($json, true);
    $accountInfo = array_reverse($arr);
?>
    <body>
        <div id="innerHere"></div>
        <div class="overlay"></div>
        <div class="user-info">
            <div class="userdis">
            <h3>Accounts</h3>
            <table style="width:100%" class="accounts-table">
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
                        if ($userCheckingBal < 0) {
                            echo '-';
                        }
                        echo '$'.number_format(abs($userCheckingBal), 2, '.', ',');
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
                        if ($userCreditsBal > (($userCheckingBal+$userSavingsBal)/2)) {
                            echo '<span title="Your debt is getting too high, consider spending less" style="color: red; cursor: default;">⚠</span>';
                        }
                        if ($userCreditsBal < 0) {
                            echo '-';
                        }
                        echo '$'.number_format(abs($userCreditsBal), 2, '.', ',');
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
                        if ($userSavingsBal < 0) {
                            echo '-';
                        }
                        echo '$'.number_format(abs($userSavingsBal), 2, '.', ',');
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
                        if (array_key_exists(0 ,$accountInfo)) {
                            echo $accountInfo[0]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(0 ,$accountInfo)) {
                            echo $accountInfo[0]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(0 ,$accountInfo)) {
                            echo $accountInfo[0]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(0 ,$accountInfo)) {
                            if ($accountInfo[0]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(0 ,$accountInfo)) {
                            if ($accountInfo[0]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($accountInfo[0]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(1 ,$accountInfo)) {
                            echo $accountInfo[1]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(1 ,$accountInfo)) {
                            echo $accountInfo[1]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(1 ,$accountInfo)) {
                            echo $accountInfo[1]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(1 ,$accountInfo)) {
                            if ($accountInfo[1]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(1 ,$accountInfo)) {
                            if ($accountInfo[1]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($accountInfo[1]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(2 ,$accountInfo)) {
                            echo $accountInfo[2]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(2 ,$accountInfo)) {
                            echo $accountInfo[2]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(2 ,$accountInfo)) {
                            echo $accountInfo[2]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(2 ,$accountInfo)) {
                            if ($accountInfo[2]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(2 ,$accountInfo)) {
                            if ($accountInfo[2]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($accountInfo[2]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(3 ,$accountInfo)) {
                            echo $accountInfo[3]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(3 ,$accountInfo)) {
                            echo $accountInfo[3]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(3 ,$accountInfo)) {
                            echo $accountInfo[3]['desc'];
                        }
                    ?>
                    </td>
                    <td class="
                    <?php
                        if (array_key_exists(3 ,$accountInfo)) {
                            if ($accountInfo[3]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>">
                    <p>
                    <?php
                        if (array_key_exists(3 ,$accountInfo)) {
                            if ($accountInfo[3]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($accountInfo[3]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(4 ,$accountInfo)) {
                            echo $accountInfo[4]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(4 ,$accountInfo)) {
                            echo $accountInfo[4]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(4 ,$accountInfo)) {
                            echo $accountInfo[4]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(4 ,$accountInfo)) {
                            if ($accountInfo[4]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(4 ,$accountInfo)) {
                            if ($accountInfo[4]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($accountInfo[4]['amount'], 2, '.', ','); 
                        }
                    ?>
                    </p></td>
                </tr>
            </table>
            <p class="load" style="margin-bottom: 100px;"><a href="/activities/">Load More</a></p>
                </div>
        </div>
        <?php
            require '../footer.php';
        ?>
    </body>
</html>