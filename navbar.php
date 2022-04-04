<div class="nav-bar">
        <ul>
            <a href="index.php">Home</a>
            <?php
                
                if(isset($_SESSION['loginStatus'])){
                    echo "<a href='favorites.php'>My Favorites</a>";
                    echo "<form action='./handlers/logout_handler.php' method='POST'>
                    <input class='logout-input' type='submit' value='Log Out'>
                    </form>";
                } else {
                    echo "<a class='sign-in-button' onclick='openSignupBox()'>Create an Account</a>";
                    echo "<a class='sign-in-button' onclick='openLoginBox()'>Sign In</a>";
                }

                function getUserInput ($lookup) {
                    return (isset($_SESSION['post'][$lookup])) ? $_SESSION['post'][$lookup] : "";
                }
            ?>
        </ul>
        <?php
            if(isset($_SESSION['loginFailed'])) {
                echo "<span>" . $_SESSION['loginFailed'] . "</span>";
                unset($_SESSION['loginFailed']);
                unset($_SESSION['loginStatus']);
            }
            if(isset($_SESSION['signup-failed'])) {
                echo "<span>" . $_SESSION['signup-failed'] . "</span>";
                unset($_SESSION['signup-failed']);
            }
            if(isset($_SESSION['signup-success'])) {
                echo "<span>" . $_SESSION['signup-success'] . "</span>";
                unset($_SESSION['passwords-match']);
            }
            if(isset($_SESSION['bad-email'])) {
                echo "<span>" . $_SESSION['bad-email'] . "</span>";
                unset($_SESSION['bad-email']);
            } 
        ?>
</div>
<div id="login-div">
    <form action="./handlers/login_handler.php" method="POST" class="login-form">
        E-mail: <input type="text" name="email" class="email-input" placeholder="example@example.com" value="<?php echo getUserInput('email') ?>"><br>
        Password: <input type="text" name="password" class="password-input" value="<?php echo getUserInput('password')?>"><br>
        <input type="submit">
    </form>
    <?php
    ?>
</div>

<div id="logout">
    <form action="./handlers/logout_handler.php" method="POST" class="sign-in-button">
        <input type="hidden" name="logout" value="1">
        <input type="submit" value="Log Out" onclick="logout()">
    </form>
</div>

<div id="signup-div">
    <form action="./handlers/signup_handler.php" method="POST" class="login-form">
        E-mail: <input type="text" name="email" class="email-input" placeholder="example@example.com" value="<?php echo getUserInput('email') ?>"><br>
        Password: <input type="text" name="password1" class="password-input" value="<?php echo getUserInput('password1')?>"><br>
        Password: <input type="text" name="password2" class="password-input" value="<?php echo getUserInput('password2')?>"><br>
        <input type="submit">
    </form>
    <?php
    ?>
</div>