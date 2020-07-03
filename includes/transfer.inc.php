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
    if ($amount <= 5000) {
        if ($outaccount !== $inaccount) {
                if ($outaccount !== 'credits') {
                    if ($accountbal >= $amount) {
                        if ($inaccount !== 'credits') {
                            $sql = "UPDATE users SET ".$outaccount."=".$outaccount."-".$amount.", ".$inaccount."=".$inaccount."+".$amount." WHERE    idUsers=".$idUser.";";
                            mysqli_query($conn, $sql);
                            header("Location: ../accounts/index.php?transfer=success");
                            exit();
                        } else if ($inaccount == 'credits') {
                            $sql = "UPDATE users SET ".$outaccount."=".$outaccount."-".$amount.", ".$inaccount."=".$inaccount."-".$amount." WHERE    idUsers=".$idUser.";";
                            mysqli_query($conn, $sql);
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