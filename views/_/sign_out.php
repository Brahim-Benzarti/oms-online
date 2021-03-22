<?php
    if(!(empty($_SESSION['id']))){
        if(!empty($_POST['sign_out'])){
            session_destroy();
            header("Location: ../index.html", TRUE, 301);
			exit();
        }else{
            ?>
                <form action="" method="POST" style="visibility: hidden;">
                    <input type="submit" value="Sign Out" name="sign_out" id="sign_out">
                </form>
            <?php
        }
    }
?>