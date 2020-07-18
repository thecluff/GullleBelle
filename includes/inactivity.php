<?php
if (isset($_SESSION['userId'])) {
$_SESSION['timesince'] = time() - $_SESSION['sessionTimeStamp'];
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
#30 minutes = 1800 15 minutes = 900
if($_SESSION['timesince'] >= 900) {
    session_destroy();
    header("Location: ../index.php?timeout");
    exit();
} else {
    $_SESSION['sessionTimeStamp'] = time();
}
}
?>