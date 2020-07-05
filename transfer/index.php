 <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    include("../head.php");
    include("../includes/variables.php");
    require $root.'/includes/inactivity.php';
?>
<?php
    include('../navbar.php');
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
<div id="innerHere"></div>
<div class="transfer-div">
    <form action="/includes/transfer.inc.php" method="post" class="transferform">
        <h3>Transfer From
        <select name="outaccount">
            <option value="chckAcc" <?php 
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] == 'sav') {
                    echo "selected='check'";
                }
            }
            ?>><?php
                echo '****'.$userCheckingN.' (';
                if ($userCheckingBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userCheckingBal), 2, '.', ',');
            ?>)
            </option>    
            <option value="credits" <?php 
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] == 'cred') {
                    echo "selected='selected'";
                }
            }
            ?>><?php
                echo '****'.$userCreditsN.' (';
                if ($userCreditsBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userCreditsBal), 2, '.', ',');
            ?>)
            </option>    
            <option value="savAcc" <?php 
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] == 'sav') {
                    echo "selected='selected'";
                }
            }
            ?>><?php
                echo '****'.$userSavingsN.' (';
                if ($userSavingsBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userSavingsBal), 2, '.', ',');
            ?>)
            </option>    
        </select>
        </h3>
        <h3>Transfer To
        <select name="inaccount">
            <option value="chckAcc" <?php 
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] !== 'check') {
                    echo "selected='selected'";
                }
            }
            ?>><?php
                echo '****'.$userCheckingN.' (';
                if ($userCheckingBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userCheckingBal), 2, '.', ',');
            ?>)
            </option>    
            <option value="credits" <?php 
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] !== 'cred') {
                    if ($_GET['transferfrom'] !== 'sav') {
                        echo "selected='selected'";
                    }
                }
            } else {
                echo "selected='selected'";
            }
            ?>><?php
                echo '****'.$userCreditsN.' (';
                if ($userCreditsBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userCreditsBal), 2, '.', ',');
            ?>)
            </option>    
            <option value="savAcc" <?php 
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] !== 'sav') {
                    if ($_GET['transferfrom'] !== 'check') {
                        echo "selected='selected'";
                    }
                }
            }
            ?>><?php
                echo '****'.$userSavingsN.' (';
                if ($userSavingsBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userSavingsBal), 2, '.', ',');
            ?>)
            </option>    
        </select>
        </h3>
        <h3>Amount(limited to $5000)
            <input name="amount" type="number" placeholder="amount" min="0.01" max="5000" required pattern="[0-9\.]+" value="0.01" step="0.01">
        </h3>
        <br>
        <button type="submit" name="transfer-submit" id="transferbtn">Send</button>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "insufficientfunds") {
                echo "<p class='ins-funds'>Insufficient Funds</p>";
            } else if ($_GET['error'] == "invalidaccounts") {
                echo "<p class='ins-funds'>Cannot use the same accounts</p>";
            } else if ($_GET['error'] == "limitreached") {
                echo "<p class='ins-funds'>You have exceeded the limit</p>";
            }
        }
        ?>
    </form>
</div>
        <?php
            require '../footer.php';
        ?>