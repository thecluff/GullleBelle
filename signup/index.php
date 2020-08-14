 <?php
    include("../head.php");
?>
<?php
    include('../navbar.php');
    if (isset($_SESSION['userId'])) {
        header("Location: ../index.php");
        exit();
    } else {
        
    }
?>

<head>
    <script src="/assets/js/main.js"></script>
</head>
<div class="signup-div">
    <form action="/includes/signup.inc.php" method="post" class="signupform">
        <h1>Signup</h1>
        <input type="text" name="firstname" id="firstname" placeholder="firstname" maxlength="35" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalidmail") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "emptyfields") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "uidtaken") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "invaliduid") {
                    echo $_GET['firstname'];
                }
            }
        ?>">
        <input type="text" name="lastname" id="lastname" placeholder="lastname" maxlength="35" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalidmail") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "emptyfields") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "uidtaken") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "invaliduid") {
                    echo $_GET['lastname'];
                }
            }
        ?>">
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "characterlimit") {
                echo '<p class="ins-funds">Your name exceeds the character limit. Abbreviate your name if needed.</p>';
            }
        }
        ?>
        <input type="text" name="uid" id="username" placeholder="username" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalidmail") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "emptyfields") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "characterlimit") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['uid'];
                }
            }
        ?>">
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "invaliduid") {
                echo '<p class="ins-funds">Invalid username</p>';
            } else if ($_GET['error'] == "uidtaken") {
                echo '<p class="ins-funds">This username has been taken</p>';
            }
        }
        ?>
        <input type="text" name="mail" id="email" placeholder="email" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "invaliduid") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "uidtaken") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "characterlimit") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['mail'];
                }
            }
        ?>">
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidmailuid") {
                echo '<p class="ins-funds">Invalid username and email</p>';
            } else if ($_GET['error'] == "invalidmail") {
                echo '<p class="ins-funds">Invalid email</p>';
            } else if ($_GET['error'] == "emailtaken") {
                echo '<p class="ins-funds">This email has been taken</p>';
            }
        }
        ?>
        <input type="password" name="pwd" id="password" placeholder="password" min="6">
        <input type="password" name="pwd-repeat" id="password-repeat" placeholder="retype password">
        <div class="reveal" onclick="reveal()">
            <img src="/assets/png/visibility-black-18dp/1x/outline_visibility_black_18dp.png" class="material-icons" id="reveal-icon">
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class="ins-funds">Please fill in the fields</p>';
            } else if ($_GET['error'] == "passwordcheck") {
                echo '<p class="ins-funds">Passwords do not match</p>';
            } else if ($_GET['error'] == "weakpass") {
                echo '<p class="ins-funds">Password is too weak, use symbols, and uppercase, lowercase letters</p>';
            } else if ($_GET['error'] == "passlength") {
                echo '<p class="ins-funds">Password is too short (enter at least 6 characters)</p>';
            }
        }
        ?>
        <button type="submit" name="signup-submit" id="log-in">Sign Up</button>
    </form>
</div>
        <?php
            require '../footer.php';
        ?>