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
            <?php require './_/nav.php' ?>
        </nav>
        <!-- content goes here -->
        <div class="clear"></div>
        <div class="main errorImage">
        <div class="errorMessage">
            <p class="error404">Yeah Us too!!</p>
        </div>
        <div class="errorMessage nomar">
            <a id="button" href="account.php">Go back</a>
        </div>
        </div>
        <footer>

        </footer>
    </body>
</html>