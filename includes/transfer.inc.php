<?php
    include 'dbh.inc.php';
    session_start();
    require 'inactivity.php';

    $sql = "SELECT * FROM users WHERE idUsers=".$_SESSION['userId'].";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $idUser = $_SESSION['userId'];
if (isset($_POST['transfer-submit'])) {
    if (isset($_SESSION['timesince'])) {
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $out = $_POST['outaccount'];
            $userCheckingBal = $row['chckAcc'];
            $userSavingsBal = $row['savAcc'];
            $userCreditsBal = $row['credits'];
            $accountbal = $row[$out];
            $userCheckingN = $row['chckNum'];
            $userSavingsN = $row['savNum'];
            $userCreditsN = $row['credNum'];
        }
    }
    $outaccount = $_POST['outaccount'];
    $inaccount = $_POST['inaccount'];
    $amount = $_POST['amount'];
    if ($inaccount == 'chckAcc') {
        $accountNumber = $userCheckingN;
    } else if ($inaccount == 'savAcc') {
        $accountNumber = $userSavingsN;
    } else if ($inaccount == 'credits') {
        $accountNumber = $userCreditsN;
    }
    if ($outaccount == 'chckAcc') {
        $accountNumberCredits = $userCheckingN;
    } else if ($outaccount == 'savAcc') {
        $accountNumberCredits = $userSavingsN;
    } else if ($outaccount == 'credits') {
        $accountNumberCredits = $userCreditsN;
    }
    if ($amount >= 0) {
        $positive = true;
        $negative = false;
    }
    if ($amount < 0) {
        $positive = false;
        $negative = true;
    }
    if ($amount <= 5000) {
        if ($outaccount !== $inaccount) {
                if ($outaccount !== 'credits') {
                    if ($accountbal >= $amount) {
                        if ($inaccount !== 'credits') {
                            $sql = "UPDATE users SET ".$outaccount."=".$outaccount."-".$amount.", ".$inaccount."=".$inaccount."+".$amount." WHERE    idUsers=".$idUser.";";
                            mysqli_query($conn, $sql);
                            $new = array(
                                "account"=>"****".$accountNumber, 
                                "date"=>date("m/d"),
                                "year"=>date("Y"),
                                "desc"=>"Balance Transfer", 
                                "amount"=>floatval($amount),
                                "positive"=>$positive
                            );
                            $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
                            $arr = json_decode($json, true);
                            $array = array_push($arr, $new);
                            $fp = fopen('../assets/users/'.$_SESSION['userUid'].'.json', 'w');
                            fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
                            header("Location: ../accounts/index.php?transfer=success");
                            exit();
                        } else if ($inaccount == 'credits') {
                            $sql = "UPDATE users SET ".$outaccount."=".$outaccount."-".$amount.", ".$inaccount."=".$inaccount."-".$amount." WHERE    idUsers=".$idUser.";";
                            mysqli_query($conn, $sql);
                            $new = array(
                                "account"=>"****".$accountNumberCredits, 
                                "date"=>date("m/d"),
                                "year"=>date("Y"),
                                "desc"=>"Balance Transfer", 
                                "amount"=>floatval($amount),
                                "positive"=>$negative
                            );
                            $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
                            $arr = json_decode($json, true);
                            $array = array_push($arr, $new);
                            $fp = fopen('../assets/users/'.$_SESSION['userUid'].'.json', 'w');
                            fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
                            header("Location: ../accounts/index.php?transfer=success");
                            exit();
                        }
                    } else {
                        header("Location: ../transfer/index.php?error=insufficientfunds");
                        exit();
                    }
                } else if ($outaccount == 'credits') {
                    $sql = "UPDATE users SET ".$outaccount."=".$outaccount."+".$amount.", ".$inaccount."=".$inaccount."+".$amount." WHERE    idUsers=".$idUser.";";
                    mysqli_query($conn, $sql);
                    $new = array(
                        "account"=>"****".$accountNumber, 
                        "date"=>date("m/d"),
                        "year"=>date("Y"),
                        "desc"=>"Balance Transfer", 
                        "amount"=>floatval($amount),
                        "positive"=>$positive
                    );
                    $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
                    $arr = json_decode($json, true);
                    $array = array_push($arr, $new);
                    $fp = fopen('../assets/users/'.$_SESSION['userUid'].'.json', 'w');
                    fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
                    header("Location: ../accounts/index.php?transfer=success");
                    exit();
                }
        } else {
            header("Location: ../transfer/index.php?error=invalidaccounts");
            exit();
        }
    } else {
        header("Location: ../transfer/index.php?error=limitreached");
        exit();
    }
}
} else {
    header("Location: ../");
    exit();
}
?>