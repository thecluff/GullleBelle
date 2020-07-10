<?php
    include 'dbh.inc.php';
    session_start();
    require 'inactivity.php';

    $sql = "SELECT * FROM users WHERE idUsers=".$_SESSION['userId'].";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
if (isset($_POST['update-submit'])) {
    if (isset($_SESSION['timesince'])) {
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $newpassword = $_POST['newpassword'];
                $confirmpassword = $_POST['confirmpassword'];
                $oldpassword = $_POST['oldpassword'];
                $oldpasswordDB = $row['pwdUsers'];
            }
            $pwdCheck = password_verify($oldpassword, $oldpasswordDB);
            if ($pwdCheck == true) {
                if ($newpassword == $confirmpassword) {
                    $sql = "UPDATE users SET pwdUsers = null WHERE idUsers = ".$_SESSION['userId'];
                    mysqli_query($conn, $sql);
                    $hashed = password_hash($newpassword, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET pwdUsers = '".$hashed."' WHERE idUsers = ".$_SESSION['userId'];
                    mysqli_query($conn, $sql);
                    header("Location: ../includes/logout.inc.php");
                    exit();
                } else {
                    header("Location: ../accounts/index.php?error=matchpwd");
                    exit();
                }
            } else {
                header("Location: ../accounts/index.php?error=wrongpwd");
                exit();
            }
        } else {
            header("Location: ../accounts/index.php?error=sqlerror");
            exit();
        }
    } else {
        header("Location: ../accounts/index.php?error=loggedout");
        exit();
    }
} else {
    header("Location: ../accounts/");
    exit();
}
?>