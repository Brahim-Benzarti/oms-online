<?php
    if(!(empty($_SESSION['id']))){
        if(!empty($_POST['sign_out'])){
            require '../dbcon.php';
            $me=$_SESSION['id'];
            $req="UPDATE users SET User_status=0 WHERE User_id=$me;";
		    mysqli_query($conn,$req)or die(mysqli_error($conn));
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