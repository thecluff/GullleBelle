<?php
if (isset($_POST['login-submit'])) {
    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if (empty($password)) {
        if (empty($mailuid)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        } else {
            header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
            exit();
        }
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck  = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd&mailuid=".$mailuid);
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['userEmail'] = $row['emailUsers'];
                    
                    $_SESSION['chckAcc'] = $row['chckAcc'];
                    $_SESSION['savAcc'] = $row['savAcc'];
                    $_SESSION['credits'] = $row['credits'];
                    $_SESSION['chckNum'] = $row['chckNum'];
                    $_SESSION['savNum'] = $row['savNum'];
                    $_SESSION['credNum'] = $row['credNum'];
                    $_SESSION['sessionTimeStamp'] = time();
                    header("Location: http://".$_SERVER['HTTP_HOST']."/accounts/index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=wrongpwd&mailuid=".$mailuid);
                    exit();
                }
            } else {
                header("Location: ../index.php?error=usernotfound");
                exit();
            }
        }
    }
} else if(isset($_POST['join-submit'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/signup/");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}