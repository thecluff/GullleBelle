<?php
if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php';
    
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    
    $chck1 = rand(1, 9999);
    $chck = strval(sprintf("%04d", $chck1));
                    
    $sav1 = rand(1, 9999);
    $sav = strval(sprintf("%04d", $sav1));
                    
    $cred1 = rand(1, 9999);
    $cred = strval(sprintf("%04d", $cred1));
    
    $checkingBal = 500000.00;
    $savingsBal = 5000.00;
    $creditBal = 1000.00;
    
    if (empty($username) || empty($email) ||  empty($password) ||  empty($passwordRepeat)) {
        header("Location: ../signup/index.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup/index.php?error=invalidmailuid");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup/index.php?error=invalidmail&uid=".$username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup/index.php?error=invaliduid&mail=".$email);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../signup/index.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    } else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            $sql2 = "SELECT * FROM users WHERE emailUsers='$email'";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);

            if ($resultCheck2 > 0) {
                header("Location: ../signup/index.php?error=emailtaken&uid=".$username);
                exit();
            } else if ($resultCheck > 0) {
                header("Location: ../signup/index.php?error=uidtaken&mail=".$email);
                exit();
            } else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, chckAcc, savAcc, credits, chckNum, savNum, credNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup/index.php?error=sqlerror");
                    exit();
                } else if (strlen($password) < 6) {
                    header("Location: ../signup/index.php?error=passlength&uid=".$username."&mail=".$email);
                    exit();
                } else if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
                    header("Location: ../signup/index.php?error=weakpass&uid=".$username."&mail=".$email);
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssss", $username, $email, $hashedPwd, $checkingBal, $savingsBal, $creditBal, $chck, $sav, $cred);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: http://".$_SERVER['HTTP_HOST']."/signup/");
    exit();
}