<?php
    include 'dbh.inc.php';
    
    $sql = "SELECT * FROM users WHERE idUsers=".$_SESSION['userId'].";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if (isset($_SESSION['userId'])) {
    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $idUser = $row['idUsers'];
            $userCheckingBal = $row['chckAcc'];
            $userSavingsBal = $row['savAcc'];
            $userCreditsBal = $row['credits'];
            $userCheckingN = $row['chckNum'];
            $userSavingsN = $row['savNum'];
            $userCreditsN = $row['credNum'];
        }
    }
    } else {
        
    }