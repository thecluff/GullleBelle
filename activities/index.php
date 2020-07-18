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
    $chunked = array_chunk($accountInfo, 10);
    if (isset($_GET['page'])) {
        $page = $_GET['page'] - 1;
    } else {
        header("Location: ../activities?page=1");
        exit();
    }
    if ($_GET['page'] <= 0) {
        header("Location: ../activities?page=1");
        exit();
    } else if (count($chunked) < $_GET['page']) {
        header("Location: ../activities?page=".count($chunked));
        exit();
    }
?>
<div id="innerHere"></div>
<div class="user-info">
    <div class="userdis">
    <h3>Recent Activities</h3>
            <table style="width:100%;">
                <tr class="checker">
                    <th>Account</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(0 ,$chunked[$page])) {
                            echo $chunked[$page][0]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(0 ,$chunked[$page])) {
                            echo $chunked[$page][0]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(0 ,$chunked[$page])) {
                            echo $chunked[$page][0]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(0 ,$chunked[$page])) {
                            if ($chunked[$page][0]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(0 ,$chunked[$page])) {
                            if ($chunked[$page][0]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($accountInfo[$page]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(1 ,$chunked[$page])) {
                            echo $chunked[$page][1]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(1 ,$chunked[$page])) {
                            echo $chunked[$page][1]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(1 ,$chunked[$page])) {
                            echo $chunked[$page][1]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(1 ,$chunked[$page])) {
                            if ($chunked[$page][1]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(1 ,$chunked[$page])) {
                            if ($chunked[$page][1]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][1]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(2 ,$chunked[$page])) {
                            echo $chunked[$page][2]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(2 ,$chunked[$page])) {
                            echo $chunked[$page][2]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(2 ,$chunked[$page])) {
                            echo $chunked[$page][2]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(2 ,$chunked[$page])) {
                            if ($chunked[$page][2]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(2 ,$chunked[$page])) {
                            if ($chunked[$page][2]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][2]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(3 ,$chunked[$page])) {
                            echo $chunked[$page][3]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(3 ,$chunked[$page])) {
                            echo $chunked[$page][3]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(3 ,$chunked[$page])) {
                            echo $chunked[$page][3]['desc'];
                        }
                    ?>
                    </td>
                    <td class="
                    <?php
                        if (array_key_exists(3 ,$chunked[$page])) {
                            if ($chunked[$page][3]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>">
                    <p>
                    <?php
                        if (array_key_exists(3 ,$chunked[$page])) {
                            if ($chunked[$page][3]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][3]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(4 ,$chunked[$page])) {
                            echo $chunked[$page][4]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(4 ,$chunked[$page])) {
                            echo $chunked[$page][4]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(4 ,$chunked[$page])) {
                            echo $chunked[$page][4]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(4 ,$chunked[$page])) {
                            if ($chunked[$page][4]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(4 ,$chunked[$page])) {
                            if ($chunked[$page][4]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][4]['amount'], 2, '.', ','); 
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(5 ,$chunked[$page])) {
                            echo $chunked[$page][5]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(5 ,$chunked[$page])) {
                            echo $chunked[$page][5]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(5 ,$chunked[$page])) {
                            echo $chunked[$page][5]['desc'];
                        }
                    ?>
                    </td>
                    <td class="
                    <?php
                        if (array_key_exists(5 ,$chunked[$page])) {
                            if ($chunked[$page][5]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>">
                    <p>
                    <?php
                        if (array_key_exists(5 ,$chunked[$page])) {
                            if ($chunked[$page][5]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][5]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(6 ,$chunked[$page])) {
                            echo $chunked[$page][6]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(6 ,$chunked[$page])) {
                            echo $chunked[$page][6]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(6 ,$chunked[$page])) {
                            echo $chunked[$page][6]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(6 ,$chunked[$page])) {
                            if ($chunked[$page][6]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(6 ,$chunked[$page])) {
                            if ($chunked[$page][6]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][6]['amount'], 2, '.', ','); 
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(7 ,$chunked[$page])) {
                            echo $chunked[$page][7]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(7 ,$chunked[$page])) {
                            echo $chunked[$page][7]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(7 ,$chunked[$page])) {
                            echo $chunked[$page][7]['desc'];
                        }
                    ?>
                    </td>
                    <td class="
                    <?php
                        if (array_key_exists(7 ,$chunked[$page])) {
                            if ($chunked[$page][7]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>">
                    <p>
                    <?php
                        if (array_key_exists(7 ,$chunked[$page])) {
                            if ($chunked[$page][7]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][7]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
                <tr>
                    <td>
                    <?php
                        if (array_key_exists(8 ,$chunked[$page])) {
                            echo $chunked[$page][8]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(8 ,$chunked[$page])) {
                            echo $chunked[$page][8]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(8 ,$chunked[$page])) {
                            echo $chunked[$page][8]['desc'];
                        }
                    ?>
                    </td>
                    <td class="<?php
                        if (array_key_exists(8 ,$chunked[$page])) {
                            if ($chunked[$page][8]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>"><p>
                    <?php
                        if (array_key_exists(8 ,$chunked[$page])) {
                            if ($chunked[$page][8]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][8]['amount'], 2, '.', ','); 
                        }
                    ?>
                    </p></td>
                </tr>
                <tr class="checker">
                    <td>
                    <?php
                        if (array_key_exists(9 ,$chunked[$page])) {
                            echo $chunked[$page][9]['account'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(9 ,$chunked[$page])) {
                            echo $chunked[$page][9]['date'];
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        if (array_key_exists(9 ,$chunked[$page])) {
                            echo $chunked[$page][9]['desc'];
                        }
                    ?>
                    </td>
                    <td class="
                    <?php
                        if (array_key_exists(9 ,$chunked[$page])) {
                            if ($chunked[$page][9]['positive'] == true){
                                echo 'positive';
                            } else {
                                echo 'negative';
                            }
                        }
                    ?>">
                    <p>
                    <?php
                        if (array_key_exists(9 ,$chunked[$page])) {
                            if ($chunked[$page][9]['positive'] == true){
                                echo '+$';
                            } else {
                                echo '-$';
                            }
                            echo number_format($chunked[$page][9]['amount'], 2, '.', ',');
                        }
                    ?>
                    </p></td>
                </tr>
            </table>
                <a class="showall no-print" href="all/">Show all</a>
        <div class="pagination" style="margin-top: 10px; margin-bottom: 100px;">
            <?php
            $pageNumNeg = $_GET['page'] - 1;
            if ($page !== 0) {
                echo "<a href='/activities/index.php?page=".$pageNumNeg."' class='pagi no-print'>❮</a>";
            } else {
                echo "<a class='pagi no-print current'>❮</a>";
            }
                $pass = 1;
                $limit = 12;
                $pages = count($chunked);
                $page = $_GET['page'];
                $radius = 2;
                while ($pass <= $pages) {
                    if ($pages < $limit) {
                        if ($pass == $_GET['page']) {
                            //current page
                            echo '<a class="pagi current">'.$pass.'</a>';
                        } else {
                            //navigation buttons
                            echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                        }
                    } else {
                        if ($pass == $page) {
                            //current page
                            echo '<a class="pagi current">'.$pass.'</a>';
                        } else {
                            if ($pass >= $page - $radius && $pass <= $radius + $page) {
                                //navigation buttons
                                echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                            } else if ($pass <= $radius) {
                                //navigation buttons
                                echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                                if ($pass == $radius) {
                                    echo '<a class="pagetoomuch">•••</a>';
                                }
                            } else if ($pass >= $pages - $radius + 1) {
                                if ($pass == $pages - $radius + 1) {
                                    echo '<a class="pagetoomuch">•••</a>';
                                }
                                echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                            }
                        }
                    }
                    $pass = $pass + 1;
                }
                
                $pageNum = $_GET['page'] + 1;
                if ($_GET['page'] < count($chunked)) {
                    echo "<a href='/activities/index.php?page=".$pageNum."' class='pagi no-print'>❯</a>";
                } else {
                    echo "<a class='pagi no-print current'>❯</a>";
                }
            ?>
        </div>
    </div>
</div>
        <?php
            require '../footer.php';
        ?>
    </body>
</html>