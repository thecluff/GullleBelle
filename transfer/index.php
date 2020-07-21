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
<div class="user-info">
    <div class="userdis transferdiv">
    <form action="/includes/transfer.inc.php" method="post" class="transferform">
        <table style="width:100%; margin-bottom: 100px;" class="transfertable">
            <tr>
                <th>Transfer From</th>
                <th>Transfer to</th>
                <th>Amount($)</th>
            </tr>
            <tr>
                <td>
                <div>
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
                    </select></div></td>
                <td>
                    <div>
        <?php
            if (!isset($_GET['external']) || $_GET['external'] == 'false') {
                echo '<select name="inaccount">';
            echo '<option value="chckAcc"';
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] !== 'check') {
                    echo "selected='selected'";
                }
            }
            echo '>';
                echo '****'.$userCheckingN.' (';
                if ($userCheckingBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userCheckingBal), 2, '.', ',');
            echo ')';
            echo '</option>';
            echo '<option value="credits"';
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] !== 'cred') {
                    if ($_GET['transferfrom'] !== 'sav') {
                        echo "selected='selected'";
                    }
                }
            } else {
                echo "selected='selected'";
            }
            echo '>';
                echo '****'.$userCreditsN.' (';
                if ($userCreditsBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userCreditsBal), 2, '.', ',');
            echo ')';
            echo '</option>';
            echo '<option value="savAcc"';
            if (isset($_GET['transferfrom'])) {
                if ($_GET['transferfrom'] !== 'sav') {
                    if ($_GET['transferfrom'] !== 'check') {
                        echo "selected='selected'";
                    }
                }
            }
            echo '>';
                
                echo '****'.$userSavingsN.' (';
                if ($userSavingsBal < 0) {
                    echo '-';
                }
                echo '$'.number_format(abs($userSavingsBal), 2, '.', ',');
            echo ')';
            echo'</option>';
            echo '</select>';
            } else if (($_GET['external']) == 'true') {
                echo '<input name="inaccountExt" type="email" placeholder="External email" required>';
            }
            ?>
                        
                        
                    </div>
                        </td>
                <td>
                    <div>
                    <input name="amount" type="number" placeholder="amount" min="0.01" max="5000" required pattern="[0-9\.]+" value="0.01" step="0.01">
                    </div>
                </td>
            </tr>
            <tr>
                <td><!--<div>
                    <?php
                    /*if (isset($_GET['external'])) {
                    if (($_GET['external']) == 'true') {
                        echo '<a href="/transfer/index.php?external=false">';
                        echo 'Transfer between personal accounts';
                        echo '</a>';
                    } else {
                        echo '<a href="/transfer/index.php?external=true">';
                        echo 'Add external account';
                        echo '</a>';
                    }
                    } else {
                        echo '<a href="/transfer/index.php?external=true">';
                        echo 'Add external account';
                        echo '</a>';
                    }*/
                    ?></div>--></td>
                <td>
                    <?php
                    if (isset($_GET['external'])) {
                    if (($_GET['external']) == 'true') {
                        echo '<input name="inaccountExtAcc" type="text" placeholder="Account type" required>';
                    }
                    }
                    ?>
                    <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "insufficientfunds") {
                echo "<p class='ins-funds'>Insufficient Funds</p>";
            } else if ($_GET['error'] == "invalidaccounts") {
                echo "<p class='ins-funds'>Cannot use the same accounts</p>";
            } else if ($_GET['error'] == "limitreached") {
                echo "<p class='ins-funds'>You have exceeded the limit</p>";
            }
        }?>
                </td>
                <td><div><button type="submit" name="transfer-submit" id="transferbtn">Send</button></div></td>
            </tr>
            <tr>
                <td></td>
                <td> <?php
        /*if (isset($_GET['error'])) {
            if ($_GET['error'] == "insufficientfunds") {
                echo "<p class='ins-funds'>Insufficient Funds</p>";
            } else if ($_GET['error'] == "invalidaccounts") {
                echo "<p class='ins-funds'>Cannot use the same accounts</p>";
            } else if ($_GET['error'] == "limitreached") {
                echo "<p class='ins-funds'>You have exceeded the limit</p>";
            }
        }*/?></td>
                <td></td>
            </tr>
        </table>
    </form>
    </div>
</div> 
        <?php
            require '../footer.php';
        ?> 