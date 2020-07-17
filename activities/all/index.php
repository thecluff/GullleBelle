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
        header("Location: ../../");
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
    $json = trim(file_get_contents("../../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
    $arr = json_decode($json, true);
    $accountInfo = array_reverse($arr);
    $chunked = array_chunk($accountInfo, 11);
?>
<div id="innerHere"></div>
<div class="user-info">
    <div class="userdis">
    <h3>All Activities</h3>
            <table style="width:100%; margin-bottom: 100px;">
                <tr class="checker">
                    <th>Account</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <?php
                function check($number) { 
                    if ($number % 2 == 0) { 
                        echo "Even";  
                    } else { 
                        echo "Odd"; 
                    } 
                }
                $passthrough = 0;
                $transactions = count($arr);
                $checker = 'checker';
                while ($passthrough < $transactions) {
                    echo "<tr class='";
                    if ($passthrough % 2 !== 0) {
                        echo $checker;
                    }
                    
                    echo "' >";
                    echo"<td>";
                    if (array_key_exists(0 ,$accountInfo)) {
                        echo $accountInfo[$passthrough]['account'];
                    }
                    echo "</td>";
                        
                    echo "<td>";
                    if (array_key_exists(0 ,$accountInfo)) {
                        echo $accountInfo[$passthrough]['date'];
                    }
                    echo "</td>";
                    echo "<td>";
                    if (array_key_exists(0 ,$accountInfo)) {
                        echo $accountInfo[$passthrough]['desc'];
                    }
                    echo "</td>";
                    echo "<td class='";
                    if (array_key_exists(0 ,$accountInfo)) {
                        if ($accountInfo[$passthrough]['positive'] == true){
                            echo 'positive';
                        } else {
                            echo 'negative';
                        }
                    }
                    echo "'>";
                        
                    echo "<p>";
                    if (array_key_exists(0 ,$accountInfo)) {
                        if ($accountInfo[$passthrough]['positive'] == true){
                            echo '+$';
                        } else {
                            echo '-$';
                        }
                        echo number_format($accountInfo[$passthrough]['amount'], 2, '.', ',');
                    }
                    echo "</p></td></tr>";
                    $passthrough = $passthrough + 1;
                } 
                ?>
            </table>
    </div>
</div>
        <?php
            require '../../footer.php';
        ?>
    </body>
</html>