
        <div class="nb no-print">
            <div class="nb_top_logo">
                <img src="/assets/png/LogoGull.png" width="50">
                <h1>Gull <span class="le">le</span> Belle <span class="bank-text">Banking</span></h1>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            echo "<a href='/accounts/update/'>".$_SESSION['firstname']." ";
                            echo $_SESSION['lastname']."</p>";
                        } else {
                            echo ' ';
                        }
                    ?>
            </div>
            <div class="list">
                <ul>
                    <li><a href="/">Home</a></li>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            echo '
                            <li><a href="/accounts">Accounts</a></li>
                            <li><a href="/transfer">Transfer</a></li>
                            <li><a href="/activities">Activities</a></li>
                            <li><a href="/includes/logout.inc.php">Logout</a></li>
                            ';
                        } else {
                            echo '
                    <li><a href="/">Fraud Awareness</a></li>
                    <li><a href="/">Affiliated Banks</a></li>
                    <li><a href="/signup">Join Us</a></li>
                    ';
                        }
                    ?>
                </ul>
            </div>
        <!--<script>document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
  if(event.keyCode == 123) {
    console.log('You cannot inspect Element');
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
}
        </script>-->
        </div>