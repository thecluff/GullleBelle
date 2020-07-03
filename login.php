
                    <?php
                        $loginerror = '';
                        $mailuidL = '';
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                $loginerror = '<p class="ins-funds">Please fill in the fields</p>';
                                $mailuidL = $_GET['mailuid'];
                            } else if ($_GET['error'] == "wrongpwd") {
                                $loginerror = '<p class="ins-funds">Wrong password</p>';
                                $mailuidL = $_GET['mailuid'];
                            } else if ($_GET['error'] == "usernotfound") {
                                $loginerror = '<p class="ins-funds">Invalid user</p>';
                            }
                        }

                        if (isset($_SESSION['userId'])) {
                            echo '
                            ';
                        } else {
                            echo ' 
                            <div class="login-modal">
                                <div class="modal-content">
                                    <h1>Online Banking</h1>
                                        <form action="/includes/login.inc.php" method="post">
                                            <input type="login" name="mailuid" id="login" placeholder="username" value='.$mailuidL.'>
                                            <input type="password" name="pwd" id="password" placeholder="password">
                                            <div class="reveal" onclick="reveal()">
                                                <img src="/assets/png/visibility-black-18dp/1x/outline_visibility_black_18dp.png" class="material-icons" id="reveal-icon">
                                            </div>
                                            <button type="submit" name="login-submit" id="log-in">Log In</button>
                                            <button id="join" name="join-submit">Join Us Today!</button>
                                        </form>
                                        '.$loginerror.'
                                </div>
                            </div>
                            ';
                        }
                    ?>
                
            