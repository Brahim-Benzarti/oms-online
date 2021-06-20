<?php 
session_start();
?>
<!doctype html>
<html>
    <head>
        <?php require './_/head.php' ?>
    </head>

    <body>
        <nav>
            <div class="logo"></div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="./views/sign_in.php">Account</a></li>
            </ul>
        </nav>
        <div class="clear"></div>
        <?php 
        if(isset($_SESSION['id'])){
            header("Location: ./account.php", TRUE, 301);
            exit();
        };
        ?>
        <!-- content goes here -->
        <div class="main">
            <!-- <div class="t0"></div> -->
            <div class="left">
                <p class="t1">Message<br>anytime,<br>anywhere.</p>
                <div class="clear_only" ></div>
                <p class="t2">OMS makes it easy and fun to stay close to your favorite people.</p>
                <div class="sign_in_space">
                    <div class="signing_container">
                        <form action="./views/sign_in.php" method="POST" onsubmit="verify_sign_in_info();">
                        <div class="info sign_in">
                            <div class="labels">
                                <label for="email">Email:</label>
                                <label for="password">Password:</label>
                            </div>
                            <div class="inputs">
                                <input type="email" id="email" name="email" required>
                                <input type="password" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="clear_only"></div>
                        <div class="choice">
                            <div>
                                <input id="button" type="submit" value="Sign In" name="sign_in">
                            </div>
                            <div class="forget_pass">
                                <a id="forget_pass" href="./views/meme.php">Forgot password?</a>
                            </div>
                        </div>
                        <div class="clear_only"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="right">
                <video autoplay loop>
                    <source src="./public/images/globe.mp4" type="video/mp4">
                </video>
            </div>
        </div>
    </body>
</html>